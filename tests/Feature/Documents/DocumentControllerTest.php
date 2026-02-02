<?php

use App\Models\Document;
use App\Models\Label;
use App\Models\Project;
use App\Models\User;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;

beforeEach(function () {
    $this->user = User::factory()->create();
    $this->project = Project::factory()->create();
});

// ==========================================
// INDEX TESTS
// ==========================================

test('documents index page is displayed', function () {
    Storage::fake('local');

    // Create documents with fake files
    $documents = Document::factory()->count(3)->forProject($this->project)->create();
    foreach ($documents as $document) {
        Storage::put($document->file_path, 'fake content');
    }

    $response = $this
        ->actingAs($this->user)
        ->get(route('documents.index'));

    $response->assertOk();
    $response->assertViewIs('documents.index');
    $response->assertViewHas('documents');
    $response->assertViewHas('stats');
});

test('guests cannot access documents index', function () {
    $response = $this->get(route('documents.index'));

    $response->assertRedirect(route('login'));
});

test('documents can be filtered by label', function () {
    Storage::fake('local');

    $label = Label::factory()->create();
    $documentWithLabel = Document::factory()->forProject($this->project)->create();
    $documentWithLabel->labels()->attach($label);
    Storage::put($documentWithLabel->file_path, 'fake content');

    $documentWithoutLabel = Document::factory()->forProject($this->project)->create();
    Storage::put($documentWithoutLabel->file_path, 'fake content');

    $response = $this
        ->actingAs($this->user)
        ->get(route('documents.index', ['label_id' => $label->id]));

    $response->assertOk();
    $response->assertSee($documentWithLabel->name);
});

test('documents can be searched by name', function () {
    Storage::fake('local');

    $documentMatching = Document::factory()->forProject($this->project)->create([
        'name' => 'Important Contract',
    ]);
    Storage::put($documentMatching->file_path, 'fake content');

    $documentNotMatching = Document::factory()->forProject($this->project)->create([
        'name' => 'Random File',
    ]);
    Storage::put($documentNotMatching->file_path, 'fake content');

    $response = $this
        ->actingAs($this->user)
        ->get(route('documents.index', ['search' => 'Contract']));

    $response->assertOk();
    $response->assertSee($documentMatching->name);
});

// ==========================================
// STORE TESTS
// ==========================================

test('document can be created with valid data', function () {
    Storage::fake('local');

    $file = UploadedFile::fake()->create('contract.pdf', 1024);

    $response = $this
        ->actingAs($this->user)
        ->post(route('documents.store', $this->project), [
            'name' => 'Test Document',
            'file' => $file,
            'notes' => 'Some notes about the document',
        ]);

    $response->assertRedirect(route('projects.show', ['project' => $this->project, 'tab' => 'documents']));
    $response->assertSessionHas('success');

    $this->assertDatabaseHas('documents', [
        'project_id' => $this->project->id,
        'name' => 'Test Document',
        'notes' => 'Some notes about the document',
    ]);

    // Check file was stored
    $document = Document::where('name', 'Test Document')->first();
    Storage::assertExists($document->file_path);
});

test('document can be created with labels', function () {
    Storage::fake('local');

    $labels = Label::factory()->count(2)->create();
    $file = UploadedFile::fake()->create('document.pdf', 512);

    $response = $this
        ->actingAs($this->user)
        ->post(route('documents.store', $this->project), [
            'name' => 'Labeled Document',
            'file' => $file,
            'label_ids' => $labels->pluck('id')->toArray(),
        ]);

    $response->assertRedirect(route('projects.show', ['project' => $this->project, 'tab' => 'documents']));
    $response->assertSessionHas('success');

    $document = Document::where('name', 'Labeled Document')->first();
    expect($document->labels->count())->toBe(2);
});

test('document cannot be created without required fields', function () {
    $response = $this
        ->actingAs($this->user)
        ->post(route('documents.store', $this->project), []);

    $response->assertSessionHasErrors(['name', 'file']);
});

test('document cannot be created without a file', function () {
    $response = $this
        ->actingAs($this->user)
        ->post(route('documents.store', $this->project), [
            'name' => 'Test Document',
        ]);

    $response->assertSessionHasErrors('file');
});

test('document cannot be created with file exceeding max size', function () {
    Storage::fake('local');

    // Create a file larger than 10MB (10240 KB)
    $file = UploadedFile::fake()->create('large-file.pdf', 11000);

    $response = $this
        ->actingAs($this->user)
        ->post(route('documents.store', $this->project), [
            'name' => 'Large Document',
            'file' => $file,
        ]);

    $response->assertSessionHasErrors('file');
});

test('document cannot be created with name exceeding max length', function () {
    Storage::fake('local');

    $file = UploadedFile::fake()->create('document.pdf', 512);

    $response = $this
        ->actingAs($this->user)
        ->post(route('documents.store', $this->project), [
            'name' => str_repeat('a', 256),
            'file' => $file,
        ]);

    $response->assertSessionHasErrors('name');
});

test('document cannot be created with notes exceeding max length', function () {
    Storage::fake('local');

    $file = UploadedFile::fake()->create('document.pdf', 512);

    $response = $this
        ->actingAs($this->user)
        ->post(route('documents.store', $this->project), [
            'name' => 'Test Document',
            'file' => $file,
            'notes' => str_repeat('a', 1001),
        ]);

    $response->assertSessionHasErrors('notes');
});

test('document cannot be created with invalid label ids', function () {
    Storage::fake('local');

    $file = UploadedFile::fake()->create('document.pdf', 512);

    $response = $this
        ->actingAs($this->user)
        ->post(route('documents.store', $this->project), [
            'name' => 'Test Document',
            'file' => $file,
            'label_ids' => [999, 998],
        ]);

    $response->assertSessionHasErrors('label_ids.0');
});

test('guests cannot create documents', function () {
    Storage::fake('local');

    $file = UploadedFile::fake()->create('document.pdf', 512);

    $response = $this->post(route('documents.store', $this->project), [
        'name' => 'Test Document',
        'file' => $file,
    ]);

    $response->assertRedirect(route('login'));
});

// ==========================================
// UPDATE TESTS
// ==========================================

test('document can be updated', function () {
    Storage::fake('local');
    Storage::put('documents/test-file.pdf', 'fake content');

    $document = Document::factory()->forProject($this->project)->create([
        'name' => 'Original Name',
        'file_path' => 'documents/test-file.pdf',
        'notes' => 'Original notes',
    ]);

    $response = $this
        ->actingAs($this->user)
        ->put(route('documents.update', [$this->project, $document]), [
            'name' => 'Updated Name',
            'notes' => 'Updated notes',
        ]);

    $response->assertRedirect(route('projects.show', ['project' => $this->project, 'tab' => 'documents']));
    $response->assertSessionHas('success');

    $document->refresh();
    expect($document->name)->toBe('Updated Name');
    expect($document->notes)->toBe('Updated notes');
});

test('document labels can be updated', function () {
    Storage::fake('local');
    Storage::put('documents/test-file.pdf', 'fake content');

    $document = Document::factory()->forProject($this->project)->create([
        'file_path' => 'documents/test-file.pdf',
    ]);
    $oldLabel = Label::factory()->create();
    $newLabels = Label::factory()->count(2)->create();

    $document->labels()->attach($oldLabel);

    $response = $this
        ->actingAs($this->user)
        ->put(route('documents.update', [$this->project, $document]), [
            'name' => $document->name,
            'label_ids' => $newLabels->pluck('id')->toArray(),
        ]);

    $response->assertRedirect(route('projects.show', ['project' => $this->project, 'tab' => 'documents']));

    $document->refresh();
    expect($document->labels->count())->toBe(2);
    expect($document->labels->pluck('id')->toArray())->toBe($newLabels->pluck('id')->toArray());
});

test('document cannot be updated without required fields', function () {
    Storage::fake('local');
    Storage::put('documents/test-file.pdf', 'fake content');

    $document = Document::factory()->forProject($this->project)->create([
        'file_path' => 'documents/test-file.pdf',
    ]);

    $response = $this
        ->actingAs($this->user)
        ->put(route('documents.update', [$this->project, $document]), []);

    $response->assertSessionHasErrors('name');
});

test('document cannot be updated with invalid data', function () {
    Storage::fake('local');
    Storage::put('documents/test-file.pdf', 'fake content');

    $document = Document::factory()->forProject($this->project)->create([
        'file_path' => 'documents/test-file.pdf',
    ]);

    $response = $this
        ->actingAs($this->user)
        ->put(route('documents.update', [$this->project, $document]), [
            'name' => str_repeat('a', 256),
            'notes' => str_repeat('a', 1001),
        ]);

    $response->assertSessionHasErrors(['name', 'notes']);
});

test('guests cannot update documents', function () {
    $document = Document::factory()->forProject($this->project)->create();

    $response = $this->put(route('documents.update', [$this->project, $document]), [
        'name' => 'Updated Name',
    ]);

    $response->assertRedirect(route('login'));
});

// ==========================================
// DELETE TESTS
// ==========================================

test('document can be deleted', function () {
    Storage::fake('local');
    Storage::put('documents/test-file.pdf', 'fake content');

    $document = Document::factory()->forProject($this->project)->create([
        'file_path' => 'documents/test-file.pdf',
    ]);
    $documentId = $document->id;

    Storage::assertExists('documents/test-file.pdf');

    $response = $this
        ->actingAs($this->user)
        ->delete(route('documents.destroy', [$this->project, $document]));

    $response->assertRedirect(route('projects.show', ['project' => $this->project, 'tab' => 'documents']));
    $response->assertSessionHas('success');

    $this->assertDatabaseMissing('documents', ['id' => $documentId]);
    Storage::assertMissing('documents/test-file.pdf');
});

test('deleting document also removes associated labels', function () {
    Storage::fake('local');
    Storage::put('documents/test-file.pdf', 'fake content');

    $document = Document::factory()->forProject($this->project)->create([
        'file_path' => 'documents/test-file.pdf',
    ]);
    $labels = Label::factory()->count(2)->create();
    $document->labels()->attach($labels);

    $documentId = $document->id;

    $response = $this
        ->actingAs($this->user)
        ->delete(route('documents.destroy', [$this->project, $document]));

    $response->assertRedirect(route('projects.show', ['project' => $this->project, 'tab' => 'documents']));

    $this->assertDatabaseMissing('documents', ['id' => $documentId]);
    $this->assertDatabaseMissing('document_label', ['document_id' => $documentId]);
});

test('guests cannot delete documents', function () {
    $document = Document::factory()->forProject($this->project)->create();

    $response = $this->delete(route('documents.destroy', [$this->project, $document]));

    $response->assertRedirect(route('login'));
});

// ==========================================
// DOWNLOAD TESTS
// ==========================================

test('document can be downloaded', function () {
    Storage::fake('local');
    Storage::put('documents/test-file.pdf', 'fake pdf content');

    $document = Document::factory()->forProject($this->project)->create([
        'name' => 'Test Document',
        'file_path' => 'documents/test-file.pdf',
    ]);

    $response = $this
        ->actingAs($this->user)
        ->get(route('documents.download', [$this->project, $document]));

    $response->assertOk();
    $response->assertDownload('Test Document.pdf');
});

test('downloading non-existent file returns 404', function () {
    $document = Document::factory()->forProject($this->project)->create([
        'file_path' => 'documents/non-existent-file.pdf',
    ]);

    $response = $this
        ->actingAs($this->user)
        ->get(route('documents.download', [$this->project, $document]));

    $response->assertNotFound();
});

test('guests cannot download documents', function () {
    Storage::fake('local');
    Storage::put('documents/test-file.pdf', 'fake content');

    $document = Document::factory()->forProject($this->project)->create([
        'file_path' => 'documents/test-file.pdf',
    ]);

    $response = $this->get(route('documents.download', [$this->project, $document]));

    $response->assertRedirect(route('login'));
});

// ==========================================
// PREVIEW TESTS
// ==========================================

test('document can be previewed', function () {
    Storage::fake('local');
    Storage::put('documents/test-file.pdf', 'fake pdf content');

    $document = Document::factory()->forProject($this->project)->create([
        'file_path' => 'documents/test-file.pdf',
    ]);

    $response = $this
        ->actingAs($this->user)
        ->get(route('documents.preview', [$this->project, $document]));

    $response->assertOk();
});

test('previewing non-existent file returns 404', function () {
    $document = Document::factory()->forProject($this->project)->create([
        'file_path' => 'documents/non-existent-file.pdf',
    ]);

    $response = $this
        ->actingAs($this->user)
        ->get(route('documents.preview', [$this->project, $document]));

    $response->assertNotFound();
});

test('guests cannot preview documents', function () {
    Storage::fake('local');
    Storage::put('documents/test-file.pdf', 'fake content');

    $document = Document::factory()->forProject($this->project)->create([
        'file_path' => 'documents/test-file.pdf',
    ]);

    $response = $this->get(route('documents.preview', [$this->project, $document]));

    $response->assertRedirect(route('login'));
});

// ==========================================
// STATS TESTS
// ==========================================

test('stats show correct count for this month', function () {
    Storage::fake('local');

    // Create documents this month
    $thisMonthDocs = Document::factory()->count(3)->forProject($this->project)->create([
        'uploaded_at' => now(),
    ]);
    foreach ($thisMonthDocs as $doc) {
        Storage::put($doc->file_path, 'fake content');
    }

    // Create documents from last month
    $lastMonthDocs = Document::factory()->count(2)->forProject($this->project)->create([
        'uploaded_at' => now()->subMonth(),
    ]);
    foreach ($lastMonthDocs as $doc) {
        Storage::put($doc->file_path, 'fake content');
    }

    $response = $this
        ->actingAs($this->user)
        ->get(route('documents.index'));

    $response->assertOk();
    $stats = $response->viewData('stats');
    expect($stats['this_month'])->toBe(3);
});

// ==========================================
// EDGE CASES
// ==========================================

test('document can be created with various file types', function () {
    Storage::fake('local');

    $fileTypes = ['pdf', 'doc', 'docx', 'xls', 'xlsx', 'png', 'jpg'];

    foreach ($fileTypes as $type) {
        $file = UploadedFile::fake()->create("document.{$type}", 512);

        $response = $this
            ->actingAs($this->user)
            ->post(route('documents.store', $this->project), [
                'name' => "Test {$type} Document",
                'file' => $file,
            ]);

        $response->assertSessionHasNoErrors();
    }

    expect(Document::where('project_id', $this->project->id)->count())->toBe(7);
});

test('document can be created without optional fields', function () {
    Storage::fake('local');

    $file = UploadedFile::fake()->create('minimal.pdf', 512);

    $response = $this
        ->actingAs($this->user)
        ->post(route('documents.store', $this->project), [
            'name' => 'Minimal Document',
            'file' => $file,
        ]);

    $response->assertRedirect(route('projects.show', ['project' => $this->project, 'tab' => 'documents']));
    $response->assertSessionHas('success');

    $this->assertDatabaseHas('documents', [
        'project_id' => $this->project->id,
        'name' => 'Minimal Document',
        'notes' => null,
    ]);
});

test('document labels can be cleared on update', function () {
    Storage::fake('local');
    Storage::put('documents/test-file.pdf', 'fake content');

    $document = Document::factory()->forProject($this->project)->create([
        'file_path' => 'documents/test-file.pdf',
    ]);
    $labels = Label::factory()->count(2)->create();
    $document->labels()->attach($labels);

    expect($document->labels->count())->toBe(2);

    $response = $this
        ->actingAs($this->user)
        ->put(route('documents.update', [$this->project, $document]), [
            'name' => $document->name,
            'label_ids' => [],
        ]);

    $response->assertRedirect(route('projects.show', ['project' => $this->project, 'tab' => 'documents']));

    $document->refresh();
    expect($document->labels->count())->toBe(0);
});
