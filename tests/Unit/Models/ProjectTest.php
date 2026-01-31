<?php

use App\Models\Client;
use App\Models\Project;

// ==========================================
// SCOPE TESTS
// ==========================================

test('withStatus scope filters by status', function () {
    Project::factory()->draft()->count(2)->create();
    Project::factory()->inProgress()->count(3)->create();

    $draftProjects = Project::withStatus('draft')->get();

    expect($draftProjects)->toHaveCount(2);
    expect($draftProjects->every(fn ($p) => $p->status === 'draft'))->toBeTrue();
});

test('forClient scope filters by client', function () {
    $client1 = Client::factory()->create();
    $client2 = Client::factory()->create();

    Project::factory()->forClient($client1)->count(2)->create();
    Project::factory()->forClient($client2)->count(3)->create();

    $client1Projects = Project::forClient($client1->id)->get();

    expect($client1Projects)->toHaveCount(2);
    expect($client1Projects->every(fn ($p) => $p->client_id === $client1->id))->toBeTrue();
});

test('internal scope returns only projects without client', function () {
    Project::factory()->internal()->count(2)->create();
    Project::factory()->count(3)->create(); // with client

    $internalProjects = Project::internal()->get();

    expect($internalProjects)->toHaveCount(2);
    expect($internalProjects->every(fn ($p) => $p->client_id === null))->toBeTrue();
});

test('active scope excludes archived projects', function () {
    Project::factory()->draft()->count(1)->create();
    Project::factory()->inProgress()->count(2)->create();
    Project::factory()->completed()->count(1)->create();
    Project::factory()->archived()->count(3)->create();

    $activeProjects = Project::active()->get();

    expect($activeProjects)->toHaveCount(4);
    expect($activeProjects->every(fn ($p) => $p->status !== 'archived'))->toBeTrue();
});

// ==========================================
// RELATIONSHIP TESTS
// ==========================================

test('project belongs to client', function () {
    $client = Client::factory()->create();
    $project = Project::factory()->forClient($client)->create();

    expect($project->client)->toBeInstanceOf(Client::class);
    expect($project->client->id)->toBe($client->id);
});

test('internal project has no client', function () {
    $project = Project::factory()->internal()->create();

    expect($project->client)->toBeNull();
    expect($project->isInternal())->toBeTrue();
});

// ==========================================
// SOFT DELETE TESTS
// ==========================================

test('project uses soft deletes', function () {
    $project = Project::factory()->create();
    $projectId = $project->id;

    $project->delete();

    expect(Project::find($projectId))->toBeNull();
    expect(Project::withTrashed()->find($projectId))->not->toBeNull();
    expect(Project::withTrashed()->find($projectId)->deleted_at)->not->toBeNull();
});

test('soft deleted project can be restored', function () {
    $project = Project::factory()->create();
    $project->delete();

    $project->restore();

    expect($project->deleted_at)->toBeNull();
    expect(Project::find($project->id))->not->toBeNull();
});

test('project can be force deleted', function () {
    $project = Project::factory()->create();
    $projectId = $project->id;

    $project->forceDelete();

    expect(Project::withTrashed()->find($projectId))->toBeNull();
});

// ==========================================
// SLUG TESTS
// ==========================================

test('slug is auto-generated on create', function () {
    $project = Project::factory()->create([
        'name' => 'My Test Project',
        'slug' => null, // Force auto-generation
    ]);

    expect($project->slug)->toContain('my-test-project');
});

test('slug is unique', function () {
    $project1 = Project::factory()->create(['name' => 'Same Name']);
    $project2 = Project::factory()->create(['name' => 'Same Name']);

    expect($project1->slug)->not->toBe($project2->slug);
});

// ==========================================
// HELPER METHODS TESTS
// ==========================================

test('isInternal returns true for project without client', function () {
    $project = Project::factory()->internal()->create();

    expect($project->isInternal())->toBeTrue();
});

test('isInternal returns false for project with client', function () {
    $project = Project::factory()->create();

    expect($project->isInternal())->toBeFalse();
});

test('getStatusValues returns all valid statuses', function () {
    $statuses = Project::getStatusValues();

    expect($statuses)->toBe(['draft', 'in_progress', 'completed', 'archived']);
});

test('getPriorityValues returns all valid priorities', function () {
    $priorities = Project::getPriorityValues();

    expect($priorities)->toBe(['low', 'medium', 'high']);
});

// ==========================================
// FILLABLE TESTS
// ==========================================

test('project has correct fillable attributes', function () {
    $project = new Project();

    $expectedFillable = [
        'client_id',
        'name',
        'slug',
        'description',
        'status',
        'type',
        'priority',
        'repo_url',
        'staging_url',
        'production_url',
        'figma_url',
        'docs_url',
        'notes',
        'start_date',
        'due_date',
    ];

    expect($project->getFillable())->toBe($expectedFillable);
});

// ==========================================
// FACTORY TESTS
// ==========================================

test('project factory creates valid project', function () {
    $project = Project::factory()->create();

    expect($project->name)->not->toBeEmpty();
    expect($project->slug)->not->toBeEmpty();
    expect($project->status)->toBeIn(['draft', 'in_progress', 'completed', 'archived']);
    expect($project->type)->toBeIn(['client_work', 'product', 'content', 'asset']);
});

test('project factory minimal state creates project with only required fields', function () {
    $project = Project::factory()->minimal()->create();

    expect($project->name)->not->toBeEmpty();
    expect($project->client_id)->toBeNull();
    expect($project->description)->toBeNull();
    expect($project->priority)->toBeNull();
    expect($project->repo_url)->toBeNull();
});

// ==========================================
// CALENDAR TESTS
// ==========================================

test('hasCalendarDate returns true when due_date is set', function () {
    $project = Project::factory()->create(['due_date' => now()->addDays(7)]);

    expect($project->hasCalendarDate())->toBeTrue();
});

test('hasCalendarDate returns false when due_date is null', function () {
    $project = Project::factory()->create(['due_date' => null]);

    expect($project->hasCalendarDate())->toBeFalse();
});

test('googleCalendarUrl returns url when due_date is set', function () {
    $project = Project::factory()->create(['due_date' => now()->addDays(7)]);

    $url = $project->googleCalendarUrl();

    expect($url)->not->toBeNull();
    expect($url)->toContain('calendar.google.com');
    expect($url)->toContain('action=TEMPLATE');
});

test('googleCalendarUrl returns null when due_date is null', function () {
    $project = Project::factory()->create(['due_date' => null]);

    expect($project->googleCalendarUrl())->toBeNull();
});

test('toCalendarEvent returns correct event for project with client', function () {
    $client = Client::factory()->create(['name' => 'Test Client']);
    $project = Project::factory()->forClient($client)->create([
        'name' => 'Test Project',
        'due_date' => now()->addDays(7),
    ]);

    $event = $project->toCalendarEvent();

    expect($event->title)->toContain('Test Client');
    expect($event->title)->toContain('Test Project');
    expect($event->description)->toContain('Test Client');
    expect($event->isAllDay)->toBeTrue();
});

test('toCalendarEvent returns correct event for internal project', function () {
    $project = Project::factory()->internal()->create([
        'name' => 'Internal Test',
        'due_date' => now()->addDays(7),
    ]);

    $event = $project->toCalendarEvent();

    expect($event->title)->toContain(__('projects.internal_project'));
    expect($event->title)->toContain('Internal Test');
    expect($event->isAllDay)->toBeTrue();
});
