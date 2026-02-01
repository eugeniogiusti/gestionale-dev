<?php

use App\Models\Payment;
use App\Models\Project;
use App\Models\User;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;

beforeEach(function () {
    Storage::fake('local');
    $this->user = User::factory()->create();
    $this->project = Project::factory()->create();
    $this->payment = Payment::factory()->paid()->forProject($this->project)->create();
});

// ==========================================
// GENERATE TESTS
// ==========================================

test('invoice can be generated and downloaded', function () {
    $response = $this
        ->actingAs($this->user)
        ->post(route('invoices.generate', $this->payment));

    $response->assertOk();
    $response->assertHeader('content-type', 'application/pdf');
});

test('guests cannot generate invoices', function () {
    $response = $this->post(route('invoices.generate', $this->payment));

    $response->assertRedirect(route('login'));
});

// ==========================================
// UPLOAD TESTS
// ==========================================

test('invoice can be uploaded', function () {
    $file = UploadedFile::fake()->create('invoice.pdf', 1000, 'application/pdf');

    $response = $this
        ->actingAs($this->user)
        ->post(route('invoices.upload', $this->payment), [
            'invoice' => $file,
        ]);

    $response->assertRedirect(route('projects.show', ['project' => $this->project->id, 'tab' => 'payments']));
    $response->assertSessionHas('success');

    $this->payment->refresh();
    expect($this->payment->invoice_path)->not->toBeNull();
    Storage::assertExists($this->payment->invoice_path);
});

test('invoice upload requires a file', function () {
    $response = $this
        ->actingAs($this->user)
        ->post(route('invoices.upload', $this->payment), []);

    $response->assertSessionHasErrors('invoice');
});

test('invoice upload must be pdf', function () {
    $file = UploadedFile::fake()->create('document.docx', 1000, 'application/msword');

    $response = $this
        ->actingAs($this->user)
        ->post(route('invoices.upload', $this->payment), [
            'invoice' => $file,
        ]);

    $response->assertSessionHasErrors('invoice');
});

test('invoice upload respects max size', function () {
    $file = UploadedFile::fake()->create('large.pdf', 11000, 'application/pdf'); // 11MB > 10MB limit

    $response = $this
        ->actingAs($this->user)
        ->post(route('invoices.upload', $this->payment), [
            'invoice' => $file,
        ]);

    $response->assertSessionHasErrors('invoice');
});

test('guests cannot upload invoices', function () {
    $file = UploadedFile::fake()->create('invoice.pdf', 1000, 'application/pdf');

    $response = $this->post(route('invoices.upload', $this->payment), [
        'invoice' => $file,
    ]);

    $response->assertRedirect(route('login'));
});

// ==========================================
// DOWNLOAD TESTS
// ==========================================

test('invoice can be downloaded', function () {
    // Create and store a fake invoice
    $file = UploadedFile::fake()->create('invoice.pdf', 1000, 'application/pdf');
    $path = 'invoices/test_invoice.pdf';
    Storage::put($path, $file->getContent());

    $this->payment->update(['invoice_path' => $path]);

    $response = $this
        ->actingAs($this->user)
        ->get(route('invoices.download', $this->payment));

    $response->assertOk();
});

test('download returns 404 when invoice does not exist', function () {
    $this->payment->update(['invoice_path' => 'invoices/nonexistent.pdf']);

    $response = $this
        ->actingAs($this->user)
        ->get(route('invoices.download', $this->payment));

    $response->assertNotFound();
});

test('guests cannot download invoices', function () {
    $response = $this->get(route('invoices.download', $this->payment));

    $response->assertRedirect(route('login'));
});

// ==========================================
// PREVIEW TESTS
// ==========================================

test('invoice can be previewed', function () {
    // Create and store a fake invoice
    $file = UploadedFile::fake()->create('invoice.pdf', 1000, 'application/pdf');
    $path = 'invoices/test_invoice.pdf';
    Storage::put($path, $file->getContent());

    $this->payment->update(['invoice_path' => $path]);

    $response = $this
        ->actingAs($this->user)
        ->get(route('invoices.preview', $this->payment));

    $response->assertOk();
});

test('preview returns 404 when invoice does not exist', function () {
    $this->payment->update(['invoice_path' => 'invoices/nonexistent.pdf']);

    $response = $this
        ->actingAs($this->user)
        ->get(route('invoices.preview', $this->payment));

    $response->assertNotFound();
});

test('guests cannot preview invoices', function () {
    $response = $this->get(route('invoices.preview', $this->payment));

    $response->assertRedirect(route('login'));
});

// ==========================================
// DELETE TESTS
// ==========================================

test('invoice can be deleted', function () {
    // Create and store a fake invoice
    $file = UploadedFile::fake()->create('invoice.pdf', 1000, 'application/pdf');
    $path = 'invoices/test_invoice.pdf';
    Storage::put($path, $file->getContent());

    $this->payment->update(['invoice_path' => $path]);

    $response = $this
        ->actingAs($this->user)
        ->delete(route('invoices.destroy', $this->payment));

    $response->assertRedirect(route('projects.show', ['project' => $this->project->id, 'tab' => 'payments']));
    $response->assertSessionHas('success');

    $this->payment->refresh();
    expect($this->payment->invoice_path)->toBeNull();
    Storage::assertMissing($path);
});

test('deleting non-existent invoice does not fail', function () {
    $this->payment->update(['invoice_path' => null]);

    $response = $this
        ->actingAs($this->user)
        ->delete(route('invoices.destroy', $this->payment));

    $response->assertRedirect(route('projects.show', ['project' => $this->project->id, 'tab' => 'payments']));
    $response->assertSessionHas('success');
});

test('guests cannot delete invoices', function () {
    $response = $this->delete(route('invoices.destroy', $this->payment));

    $response->assertRedirect(route('login'));
});

// ==========================================
// EDGE CASES
// ==========================================

test('uploading new invoice deletes old file', function () {
    // Upload first invoice
    $file1 = UploadedFile::fake()->create('invoice1.pdf', 1000, 'application/pdf');

    $this
        ->actingAs($this->user)
        ->post(route('invoices.upload', $this->payment), ['invoice' => $file1]);

    $this->payment->refresh();
    $oldPath = $this->payment->invoice_path;
    Storage::assertExists($oldPath);

    // Upload second invoice
    $file2 = UploadedFile::fake()->create('invoice2.pdf', 1000, 'application/pdf');

    $this
        ->actingAs($this->user)
        ->post(route('invoices.upload', $this->payment), ['invoice' => $file2]);

    $this->payment->refresh();

    // Path is updated in DB
    expect($this->payment->invoice_path)->not->toBe($oldPath);
    Storage::assertExists($this->payment->invoice_path);

    // Old file is deleted
    Storage::assertMissing($oldPath);
});

test('payment returns 404 for non-existent payment', function () {
    $response = $this
        ->actingAs($this->user)
        ->get(route('invoices.download', 99999));

    $response->assertNotFound();
});

// ==========================================
// FILENAME TRANSLATION TESTS
// ==========================================

test('generated invoice filename uses translation', function () {
    $response = $this
        ->actingAs($this->user)
        ->post(route('invoices.generate', $this->payment));

    $response->assertOk();

    $contentDisposition = $response->headers->get('content-disposition');

    // Should contain translated "Invoice" or "Fattura" based on locale
    $translatedInvoice = __('invoices.invoice');
    expect($contentDisposition)->toContain($translatedInvoice);
});

test('downloaded invoice filename uses translation', function () {
    // Create and store a fake invoice
    $file = UploadedFile::fake()->create('invoice.pdf', 1000, 'application/pdf');
    $path = 'invoices/test_invoice.pdf';
    Storage::put($path, $file->getContent());

    $this->payment->update([
        'invoice_path' => $path,
        'reference' => 'INV-2024-001',
    ]);

    $response = $this
        ->actingAs($this->user)
        ->get(route('invoices.download', $this->payment));

    $response->assertOk();

    $contentDisposition = $response->headers->get('content-disposition');

    // Should contain translated "Invoice" or "Fattura" based on locale
    $translatedInvoice = __('invoices.invoice');
    expect($contentDisposition)->toContain($translatedInvoice);
});

test('preview invoice has correct security headers', function () {
    // Create and store a fake invoice
    $file = UploadedFile::fake()->create('invoice.pdf', 1000, 'application/pdf');
    $path = 'invoices/test_invoice.pdf';
    Storage::put($path, $file->getContent());

    $this->payment->update(['invoice_path' => $path]);

    $response = $this
        ->actingAs($this->user)
        ->get(route('invoices.preview', $this->payment));

    $response->assertOk();
    $response->assertHeader('X-Content-Type-Options', 'nosniff');

    // Check that Cache-Control contains no-store (the critical security part)
    $cacheControl = $response->headers->get('Cache-Control');
    expect($cacheControl)->toContain('no-store');
});
