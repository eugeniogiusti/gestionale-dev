<?php

use App\Models\Project;
use App\Models\Task;
use App\Queries\Tasks\TaskIndexQuery;

test('index query returns paginated results', function () {
    Task::factory()->count(25)->create();

    $result = (new TaskIndexQuery())->handle();

    expect($result)->toBeInstanceOf(\Illuminate\Pagination\LengthAwarePaginator::class);
    expect($result->count())->toBe(20); // Default pagination
    expect($result->total())->toBe(25);
});

test('index query filters by project_id', function () {
    $project = Project::factory()->create();
    Task::factory()->forProject($project)->count(3)->create();
    Task::factory()->count(2)->create();

    request()->merge(['project_id' => $project->id]);

    $result = (new TaskIndexQuery())->handle();

    expect($result->total())->toBe(3);
});

test('index query filters by status', function () {
    Task::factory()->todo()->count(3)->create();
    Task::factory()->inProgress()->count(2)->create();

    request()->merge(['status' => 'todo']);

    $result = (new TaskIndexQuery())->handle();

    expect($result->total())->toBe(3);
});

test('index query filters by type', function () {
    Task::factory()->feature()->count(3)->create();
    Task::factory()->bug()->count(2)->create();

    request()->merge(['type' => 'bug']);

    $result = (new TaskIndexQuery())->handle();

    expect($result->total())->toBe(2);
});

test('index query filters by priority', function () {
    Task::factory()->highPriority()->count(3)->create();
    Task::factory()->lowPriority()->count(2)->create();

    request()->merge(['priority' => 'high']);

    $result = (new TaskIndexQuery())->handle();

    expect($result->total())->toBe(3);
});

test('index query searches by title', function () {
    Task::factory()->create(['title' => 'Fix login bug']);
    Task::factory()->create(['title' => 'Add new feature']);
    Task::factory()->create(['title' => 'Refactor code']);

    request()->merge(['search' => 'login']);

    $result = (new TaskIndexQuery())->handle();

    expect($result->total())->toBe(1);
    expect($result->first()->title)->toBe('Fix login bug');
});

test('index query searches by description', function () {
    Task::factory()->create(['description' => 'This affects authentication']);
    Task::factory()->create(['description' => 'Something else']);

    request()->merge(['search' => 'authentication']);

    $result = (new TaskIndexQuery())->handle();

    expect($result->total())->toBe(1);
});

test('index query searches by project name', function () {
    $projectAlpha = Project::factory()->create(['name' => 'Alpha Project']);
    $projectBeta = Project::factory()->create(['name' => 'Beta Project']);

    Task::factory()->forProject($projectAlpha)->count(2)->create();
    Task::factory()->forProject($projectBeta)->count(3)->create();

    request()->merge(['search' => 'Alpha']);

    $result = (new TaskIndexQuery())->handle();

    expect($result->total())->toBe(2);
    expect($result->pluck('project_id')->unique()->values()->all())->toBe([$projectAlpha->id]);
});

test('index query eager loads project relationship', function () {
    Task::factory()->count(3)->create();

    $result = (new TaskIndexQuery())->handle();

    // If relationship is loaded, accessing it won't trigger a query
    expect($result->first()->relationLoaded('project'))->toBeTrue();
});

test('index query orders by order then created_at', function () {
    $project = Project::factory()->create();

    $task1 = Task::factory()->forProject($project)->create(['order' => 2]);
    $task2 = Task::factory()->forProject($project)->create(['order' => 1]);
    $task3 = Task::factory()->forProject($project)->create(['order' => 1, 'created_at' => now()->subDay()]);

    $result = (new TaskIndexQuery())->handle();

    // Order 1 tasks first (task2 newer, task3 older), then order 2
    expect($result->items()[0]->id)->toBe($task2->id);
    expect($result->items()[1]->id)->toBe($task3->id);
    expect($result->items()[2]->id)->toBe($task1->id);
});

test('index query combines multiple filters', function () {
    $project = Project::factory()->create();

    // Matches all filters
    Task::factory()->forProject($project)->bug()->todo()->highPriority()->create([
        'title' => 'Critical bug fix',
    ]);

    // Wrong project
    Task::factory()->bug()->todo()->highPriority()->create([
        'title' => 'Another bug fix',
    ]);

    // Wrong type
    Task::factory()->forProject($project)->feature()->todo()->highPriority()->create();

    // Wrong status
    Task::factory()->forProject($project)->bug()->done()->highPriority()->create();

    request()->merge([
        'project_id' => $project->id,
        'type' => 'bug',
        'status' => 'todo',
        'priority' => 'high',
    ]);

    $result = (new TaskIndexQuery())->handle();

    expect($result->total())->toBe(1);
    expect($result->first()->title)->toBe('Critical bug fix');
});
