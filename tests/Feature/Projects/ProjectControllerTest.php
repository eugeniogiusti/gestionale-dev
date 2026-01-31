<?php

use App\Models\Client;
use App\Models\Project;
use App\Models\User;

beforeEach(function () {
    $this->user = User::factory()->create();
});

// ==========================================
// INDEX TESTS
// ==========================================

test('projects index page is displayed', function () {
    Project::factory()->count(3)->create();

    $response = $this
        ->actingAs($this->user)
        ->get(route('projects.index'));

    $response->assertOk();
    $response->assertViewIs('projects.index');
    $response->assertViewHas('projects');
    $response->assertViewHas('stats');
});

test('projects index can filter by status', function () {
    Project::factory()->inProgress()->count(2)->create();
    Project::factory()->draft()->count(3)->create();

    $response = $this
        ->actingAs($this->user)
        ->get(route('projects.index', ['status' => 'in_progress']));

    $response->assertOk();
    expect($response->viewData('projects')->count())->toBe(2);
});

test('projects index can filter by priority', function () {
    Project::factory()->highPriority()->count(2)->create();
    Project::factory()->lowPriority()->count(3)->create();

    $response = $this
        ->actingAs($this->user)
        ->get(route('projects.index', ['priority' => 'high']));

    $response->assertOk();
    expect($response->viewData('projects')->count())->toBe(2);
});

test('projects index can search by name', function () {
    Project::factory()->create(['name' => 'Website Redesign']);
    Project::factory()->create(['name' => 'Mobile App']);

    $response = $this
        ->actingAs($this->user)
        ->get(route('projects.index', ['search' => 'Website']));

    $response->assertOk();
    expect($response->viewData('projects')->count())->toBe(1);
    expect($response->viewData('projects')->first()->name)->toBe('Website Redesign');
});

test('projects index can search by client name', function () {
    $acmeClient = Client::factory()->create(['name' => 'Acme Corp']);
    $betaClient = Client::factory()->create(['name' => 'Beta Inc']);

    Project::factory()->forClient($acmeClient)->create();
    Project::factory()->forClient($betaClient)->create();

    $response = $this
        ->actingAs($this->user)
        ->get(route('projects.index', ['search' => 'Acme']));

    $response->assertOk();
    expect($response->viewData('projects')->count())->toBe(1);
});

test('guests cannot access projects index', function () {
    $response = $this->get(route('projects.index'));

    $response->assertRedirect(route('login'));
});

// ==========================================
// STORE TESTS
// ==========================================

test('project can be created with valid data', function () {
    $projectData = [
        'name' => 'New Project',
        'status' => 'draft',
        'type' => 'client_work',
    ];

    $response = $this
        ->actingAs($this->user)
        ->post(route('projects.store'), $projectData);

    $response->assertRedirect(route('projects.index'));
    $response->assertSessionHas('success');

    $this->assertDatabaseHas('projects', [
        'name' => 'New Project',
        'status' => 'draft',
        'type' => 'client_work',
    ]);
});

test('project can be created with client', function () {
    $client = Client::factory()->create();

    $projectData = [
        'name' => 'Client Project',
        'status' => 'in_progress',
        'type' => 'client_work',
        'client_id' => $client->id,
    ];

    $response = $this
        ->actingAs($this->user)
        ->post(route('projects.store'), $projectData);

    $response->assertRedirect(route('projects.index'));
    $this->assertDatabaseHas('projects', [
        'name' => 'Client Project',
        'client_id' => $client->id,
    ]);
});

test('project can be created with all fields', function () {
    $client = Client::factory()->create();

    $projectData = [
        'name' => 'Full Project',
        'status' => 'in_progress',
        'type' => 'product',
        'client_id' => $client->id,
        'description' => 'A detailed description',
        'priority' => 'high',
        'repo_url' => 'https://github.com/example/repo',
        'staging_url' => 'https://staging.example.com',
        'production_url' => 'https://example.com',
        'figma_url' => 'https://figma.com/file/xyz',
        'docs_url' => 'https://docs.example.com',
        'notes' => 'Some notes',
        'start_date' => '2024-01-01',
        'due_date' => '2024-06-30',
    ];

    $response = $this
        ->actingAs($this->user)
        ->post(route('projects.store'), $projectData);

    $response->assertRedirect(route('projects.index'));
    $this->assertDatabaseHas('projects', ['name' => 'Full Project']);
});

test('project cannot be created without required fields', function () {
    $response = $this
        ->actingAs($this->user)
        ->post(route('projects.store'), []);

    $response->assertSessionHasErrors(['name', 'status', 'type']);
});

test('project cannot be created with invalid status', function () {
    $response = $this
        ->actingAs($this->user)
        ->post(route('projects.store'), [
            'name' => 'New Project',
            'status' => 'invalid_status',
            'type' => 'client_work',
        ]);

    $response->assertSessionHasErrors('status');
});

test('project cannot be created with invalid type', function () {
    $response = $this
        ->actingAs($this->user)
        ->post(route('projects.store'), [
            'name' => 'New Project',
            'status' => 'draft',
            'type' => 'invalid_type',
        ]);

    $response->assertSessionHasErrors('type');
});

test('project cannot be created with non-existent client', function () {
    $response = $this
        ->actingAs($this->user)
        ->post(route('projects.store'), [
            'name' => 'New Project',
            'status' => 'draft',
            'type' => 'client_work',
            'client_id' => 99999,
        ]);

    $response->assertSessionHasErrors('client_id');
});

test('project cannot be created with invalid url', function () {
    $response = $this
        ->actingAs($this->user)
        ->post(route('projects.store'), [
            'name' => 'New Project',
            'status' => 'draft',
            'type' => 'client_work',
            'repo_url' => 'not-a-url',
        ]);

    $response->assertSessionHasErrors('repo_url');
});

test('project cannot be created with due_date before start_date', function () {
    $response = $this
        ->actingAs($this->user)
        ->post(route('projects.store'), [
            'name' => 'New Project',
            'status' => 'draft',
            'type' => 'client_work',
            'start_date' => '2024-06-01',
            'due_date' => '2024-01-01',
        ]);

    $response->assertSessionHasErrors('due_date');
});

test('project slug is auto-generated', function () {
    $projectData = [
        'name' => 'My Amazing Project',
        'status' => 'draft',
        'type' => 'client_work',
    ];

    $this
        ->actingAs($this->user)
        ->post(route('projects.store'), $projectData);

    $project = Project::where('name', 'My Amazing Project')->first();
    expect($project->slug)->toContain('my-amazing-project');
});

// ==========================================
// SHOW TESTS
// ==========================================

test('project show page is displayed', function () {
    $project = Project::factory()->create();

    $response = $this
        ->actingAs($this->user)
        ->get(route('projects.show', $project));

    $response->assertOk();
    $response->assertViewIs('projects.show');
    $response->assertViewHas('project');
    $response->assertViewHas('profitData');
});

test('project show loads related data', function () {
    $project = Project::factory()->create();

    $response = $this
        ->actingAs($this->user)
        ->get(route('projects.show', $project));

    $response->assertOk();
    // The project should have client relation loaded
    $viewProject = $response->viewData('project');
    expect($viewProject->relationLoaded('client'))->toBeTrue();
    // Related data is now passed via showData array (limited query)
    $showData = $response->viewData('showData');
    expect($showData)->toHaveKeys(['tasks', 'tasksCount', 'meetings', 'meetingsCount', 'payments', 'paymentsCount', 'costs', 'costsCount', 'documents', 'documentsCount']);
});

test('project show returns 404 for non-existent project', function () {
    $response = $this
        ->actingAs($this->user)
        ->get(route('projects.show', 99999));

    $response->assertNotFound();
});

// ==========================================
// UPDATE TESTS
// ==========================================

test('project can be updated', function () {
    $project = Project::factory()->create([
        'name' => 'Old Name',
        'status' => 'draft',
    ]);

    $response = $this
        ->actingAs($this->user)
        ->put(route('projects.update', $project), [
            'name' => 'New Name',
            'status' => 'in_progress',
            'type' => 'client_work',
        ]);

    $response->assertRedirect(route('projects.index'));
    $response->assertSessionHas('success');

    $project->refresh();
    expect($project->name)->toBe('New Name');
    expect($project->status)->toBe('in_progress');
});

test('project update redirects to show when back=show', function () {
    $project = Project::factory()->create();

    $response = $this
        ->actingAs($this->user)
        ->put(route('projects.update', $project), [
            'name' => 'Updated Name',
            'status' => 'in_progress',
            'type' => 'client_work',
            'back' => 'show',
        ]);

    $response->assertRedirect(route('projects.show', $project));
});

// ==========================================
// DELETE TESTS (Soft Delete)
// ==========================================

test('project can be soft deleted', function () {
    $project = Project::factory()->create();

    $response = $this
        ->actingAs($this->user)
        ->delete(route('projects.destroy', $project));

    $response->assertRedirect(route('projects.index'));
    $response->assertSessionHas('success');

    $this->assertSoftDeleted('projects', ['id' => $project->id]);
});

test('soft deleted project is not visible in index', function () {
    $project = Project::factory()->create();
    $project->delete();

    $response = $this
        ->actingAs($this->user)
        ->get(route('projects.index'));

    $response->assertOk();
    expect($response->viewData('projects')->contains('id', $project->id))->toBeFalse();
});

// ==========================================
// RESTORE TESTS
// ==========================================

test('soft deleted project can be restored', function () {
    $project = Project::factory()->create();
    $project->delete();

    $response = $this
        ->actingAs($this->user)
        ->post(route('projects.restore', $project->id));

    $response->assertRedirect(route('projects.index'));
    $response->assertSessionHas('success');

    $project->refresh();
    expect($project->deleted_at)->toBeNull();
});

test('restore returns 404 for non-existent project', function () {
    $response = $this
        ->actingAs($this->user)
        ->post(route('projects.restore', 99999));

    $response->assertNotFound();
});

// ==========================================
// FORCE DELETE TESTS
// ==========================================

test('project can be permanently deleted', function () {
    $project = Project::factory()->create();
    $projectId = $project->id;
    $project->delete();

    $response = $this
        ->actingAs($this->user)
        ->delete(route('projects.force-delete', $projectId));

    $response->assertRedirect(route('projects.index'));
    $response->assertSessionHas('success');

    $this->assertDatabaseMissing('projects', ['id' => $projectId]);
});

test('force delete returns 404 for non-existent project', function () {
    $response = $this
        ->actingAs($this->user)
        ->delete(route('projects.force-delete', 99999));

    $response->assertNotFound();
});
