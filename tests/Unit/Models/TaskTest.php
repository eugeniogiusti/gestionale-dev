<?php

use App\Models\Project;
use App\Models\Task;

/* -----------------------------------------------------------------
 |  SCOPES
 |-----------------------------------------------------------------*/

test('status scope filters by status', function () {
    Task::factory()->todo()->count(2)->create();
    Task::factory()->inProgress()->count(3)->create();
    Task::factory()->done()->count(1)->create();

    expect(Task::status('todo')->count())->toBe(2);
    expect(Task::status('in_progress')->count())->toBe(3);
    expect(Task::status('done')->count())->toBe(1);
});

test('type scope filters by type', function () {
    Task::factory()->feature()->count(2)->create();
    Task::factory()->bug()->count(3)->create();

    expect(Task::type('feature')->count())->toBe(2);
    expect(Task::type('bug')->count())->toBe(3);
});

test('priority scope filters by priority', function () {
    Task::factory()->highPriority()->count(2)->create();
    Task::factory()->lowPriority()->count(3)->create();

    expect(Task::priority('high')->count())->toBe(2);
    expect(Task::priority('low')->count())->toBe(3);
});

test('overdue scope returns only overdue tasks', function () {
    // Overdue: past due_date and not done
    Task::factory()->create([
        'due_date' => now()->subDays(5),
        'status' => 'todo',
    ]);

    // Not overdue: future due_date
    Task::factory()->create([
        'due_date' => now()->addDays(5),
        'status' => 'todo',
    ]);

    // Not overdue: past due_date but done
    Task::factory()->create([
        'due_date' => now()->subDays(5),
        'status' => 'done',
    ]);

    // Not overdue: no due_date
    Task::factory()->create([
        'due_date' => null,
        'status' => 'todo',
    ]);

    expect(Task::overdue()->count())->toBe(1);
});

test('open scope returns non-done tasks', function () {
    Task::factory()->todo()->count(2)->create();
    Task::factory()->inProgress()->count(2)->create();
    Task::factory()->blocked()->count(1)->create();
    Task::factory()->done()->count(3)->create();

    // Open = todo, in_progress, blocked
    expect(Task::open()->count())->toBe(5);
});

/* -----------------------------------------------------------------
 |  RELATIONSHIPS
 |-----------------------------------------------------------------*/

test('task belongs to project', function () {
    $project = Project::factory()->create();
    $task = Task::factory()->forProject($project)->create();

    expect($task->project)->toBeInstanceOf(Project::class);
    expect($task->project->id)->toBe($project->id);
});

/* -----------------------------------------------------------------
 |  HELPERS
 |-----------------------------------------------------------------*/

test('isDone returns true for done status', function () {
    $task = Task::factory()->done()->create();

    expect($task->isDone())->toBeTrue();
});

test('isDone returns false for non-done status', function () {
    $task = Task::factory()->todo()->create();

    expect($task->isDone())->toBeFalse();
});

test('isBlocked returns true for blocked status', function () {
    $task = Task::factory()->blocked()->create();

    expect($task->isBlocked())->toBeTrue();
});

test('isBlocked returns false for non-blocked status', function () {
    $task = Task::factory()->todo()->create();

    expect($task->isBlocked())->toBeFalse();
});

test('isOverdue returns true for overdue task', function () {
    $task = Task::factory()->create([
        'due_date' => now()->subDays(5),
        'status' => 'todo',
    ]);

    expect($task->isOverdue())->toBeTrue();
});

test('isOverdue returns false for future due date', function () {
    $task = Task::factory()->create([
        'due_date' => now()->addDays(5),
        'status' => 'todo',
    ]);

    expect($task->isOverdue())->toBeFalse();
});

test('isOverdue returns false for done task', function () {
    $task = Task::factory()->create([
        'due_date' => now()->subDays(5),
        'status' => 'done',
    ]);

    expect($task->isOverdue())->toBeFalse();
});

test('isOverdue returns false for null due date', function () {
    $task = Task::factory()->create([
        'due_date' => null,
        'status' => 'todo',
    ]);

    expect($task->isOverdue())->toBeFalse();
});

/* -----------------------------------------------------------------
 |  CONSTANTS
 |-----------------------------------------------------------------*/

test('TYPES constant contains valid types', function () {
    expect(Task::TYPES)->toContain('feature');
    expect(Task::TYPES)->toContain('bug');
    expect(Task::TYPES)->toContain('infra');
    expect(Task::TYPES)->toContain('refactor');
    expect(Task::TYPES)->toContain('research');
    expect(Task::TYPES)->toContain('administrative');
});

test('STATUSES constant contains valid statuses', function () {
    expect(Task::STATUSES)->toContain('todo');
    expect(Task::STATUSES)->toContain('in_progress');
    expect(Task::STATUSES)->toContain('blocked');
    expect(Task::STATUSES)->toContain('done');
});

test('PRIORITIES constant contains valid priorities', function () {
    expect(Task::PRIORITIES)->toContain('low');
    expect(Task::PRIORITIES)->toContain('medium');
    expect(Task::PRIORITIES)->toContain('high');
});

/* -----------------------------------------------------------------
 |  FILLABLE
 |-----------------------------------------------------------------*/

test('task has correct fillable attributes', function () {
    $task = new Task();

    expect($task->getFillable())->toContain('project_id');
    expect($task->getFillable())->toContain('title');
    expect($task->getFillable())->toContain('description');
    expect($task->getFillable())->toContain('type');
    expect($task->getFillable())->toContain('status');
    expect($task->getFillable())->toContain('priority');
    expect($task->getFillable())->toContain('due_date');
    expect($task->getFillable())->toContain('order');
});

/* -----------------------------------------------------------------
 |  FACTORY
 |-----------------------------------------------------------------*/

test('task factory creates valid task', function () {
    $task = Task::factory()->create();

    expect($task)->toBeInstanceOf(Task::class);
    expect($task->id)->not->toBeNull();
    expect($task->project_id)->not->toBeNull();
    expect($task->title)->not->toBeNull();
    expect($task->type)->toBeIn(Task::TYPES);
    expect($task->status)->toBeIn(Task::STATUSES);
});

test('task factory minimal state creates task with only required fields', function () {
    $task = Task::factory()->minimal()->create();

    expect($task->title)->not->toBeNull();
    expect($task->description)->toBeNull();
    expect($task->type)->toBe('feature');
    expect($task->status)->toBe('todo');
    expect($task->priority)->toBeNull();
    expect($task->due_date)->toBeNull();
    expect($task->order)->toBe(0);
});
