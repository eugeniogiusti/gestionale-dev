<?php

use App\Models\Project;
use App\Models\Task;
use App\Models\User;

beforeEach(function () {
    $this->user = User::factory()->create();
    $this->actingAs($this->user);
});

/* -----------------------------------------------------------------
 |  INDEX
 |-----------------------------------------------------------------*/

test('tasks index page is displayed', function () {
    Task::factory()->count(3)->create();

    $response = $this->get(route('tasks.index'));

    $response->assertStatus(200);
    $response->assertViewIs('tasks.index');
    $response->assertViewHas('tasks');
    $response->assertViewHas('stats');
});

test('tasks index can filter by status', function () {
    Task::factory()->todo()->count(2)->create();
    Task::factory()->inProgress()->count(3)->create();

    $response = $this->get(route('tasks.index', ['status' => 'todo']));

    $response->assertStatus(200);
    $tasks = $response->viewData('tasks');
    expect($tasks->count())->toBe(2);
});

test('tasks index can filter by type', function () {
    Task::factory()->feature()->count(2)->create();
    Task::factory()->bug()->count(3)->create();

    $response = $this->get(route('tasks.index', ['type' => 'bug']));

    $response->assertStatus(200);
    $tasks = $response->viewData('tasks');
    expect($tasks->count())->toBe(3);
});

test('tasks index can filter by priority', function () {
    Task::factory()->highPriority()->count(2)->create();
    Task::factory()->lowPriority()->count(3)->create();

    $response = $this->get(route('tasks.index', ['priority' => 'high']));

    $response->assertStatus(200);
    $tasks = $response->viewData('tasks');
    expect($tasks->count())->toBe(2);
});

test('tasks index can filter by project', function () {
    $project = Project::factory()->create();
    Task::factory()->forProject($project)->count(2)->create();
    Task::factory()->count(3)->create();

    $response = $this->get(route('tasks.index', ['project_id' => $project->id]));

    $response->assertStatus(200);
    $tasks = $response->viewData('tasks');
    expect($tasks->count())->toBe(2);
});

test('tasks index can search by title', function () {
    Task::factory()->create(['title' => 'Fix authentication bug']);
    Task::factory()->create(['title' => 'Add new feature']);

    $response = $this->get(route('tasks.index', ['search' => 'authentication']));

    $response->assertStatus(200);
    $tasks = $response->viewData('tasks');
    expect($tasks->count())->toBe(1);
});

test('tasks index can search by description', function () {
    Task::factory()->create(['description' => 'This is about login flow']);
    Task::factory()->create(['description' => 'Something else']);

    $response = $this->get(route('tasks.index', ['search' => 'login']));

    $response->assertStatus(200);
    $tasks = $response->viewData('tasks');
    expect($tasks->count())->toBe(1);
});

test('guests cannot access tasks index', function () {
    auth()->logout();

    $response = $this->get(route('tasks.index'));

    $response->assertRedirect(route('login'));
});

/* -----------------------------------------------------------------
 |  STORE
 |-----------------------------------------------------------------*/

test('task can be created with valid data', function () {
    $project = Project::factory()->create();

    $response = $this->post(route('tasks.store', $project), [
        'title' => 'New Task',
        'type' => 'feature',
        'status' => 'todo',
    ]);

    $response->assertRedirect(route('projects.show', ['project' => $project, 'tab' => 'tasks']));
    $response->assertSessionHas('success');

    $this->assertDatabaseHas('tasks', [
        'project_id' => $project->id,
        'title' => 'New Task',
        'type' => 'feature',
        'status' => 'todo',
    ]);
});

test('task can be created with all fields', function () {
    $project = Project::factory()->create();

    $response = $this->post(route('tasks.store', $project), [
        'title' => 'Complete Task',
        'description' => 'This is a detailed description',
        'type' => 'bug',
        'status' => 'in_progress',
        'priority' => 'high',
        'due_date' => now()->addDays(7)->format('Y-m-d'),
        'order' => 5,
    ]);

    $response->assertRedirect();
    $response->assertSessionHas('success');

    $this->assertDatabaseHas('tasks', [
        'project_id' => $project->id,
        'title' => 'Complete Task',
        'description' => 'This is a detailed description',
        'type' => 'bug',
        'status' => 'in_progress',
        'priority' => 'high',
        'order' => 5,
    ]);
});

test('task cannot be created without required fields', function () {
    $project = Project::factory()->create();

    $response = $this->post(route('tasks.store', $project), []);

    $response->assertSessionHasErrors(['title', 'type', 'status']);
});

test('task cannot be created with invalid type', function () {
    $project = Project::factory()->create();

    $response = $this->post(route('tasks.store', $project), [
        'title' => 'New Task',
        'type' => 'invalid_type',
        'status' => 'todo',
    ]);

    $response->assertSessionHasErrors(['type']);
});

test('task cannot be created with invalid status', function () {
    $project = Project::factory()->create();

    $response = $this->post(route('tasks.store', $project), [
        'title' => 'New Task',
        'type' => 'feature',
        'status' => 'invalid_status',
    ]);

    $response->assertSessionHasErrors(['status']);
});

test('task cannot be created with invalid priority', function () {
    $project = Project::factory()->create();

    $response = $this->post(route('tasks.store', $project), [
        'title' => 'New Task',
        'type' => 'feature',
        'status' => 'todo',
        'priority' => 'invalid_priority',
    ]);

    $response->assertSessionHasErrors(['priority']);
});

test('task cannot be created with past due date', function () {
    $project = Project::factory()->create();

    $response = $this->post(route('tasks.store', $project), [
        'title' => 'New Task',
        'type' => 'feature',
        'status' => 'todo',
        'due_date' => now()->subDays(5)->format('Y-m-d'),
    ]);

    $response->assertSessionHasErrors(['due_date']);
});

/* -----------------------------------------------------------------
 |  UPDATE
 |-----------------------------------------------------------------*/

test('task can be updated', function () {
    $project = Project::factory()->create();
    $task = Task::factory()->forProject($project)->create([
        'title' => 'Original Title',
        'status' => 'todo',
    ]);

    $response = $this->put(route('tasks.update', [$project, $task]), [
        'title' => 'Updated Title',
        'type' => 'feature',
        'status' => 'in_progress',
    ]);

    $response->assertRedirect(route('projects.show', ['project' => $project, 'tab' => 'tasks']));
    $response->assertSessionHas('success');

    $task->refresh();
    expect($task->title)->toBe('Updated Title');
    expect($task->status)->toBe('in_progress');
});

test('task status can be changed to done', function () {
    $project = Project::factory()->create();
    $task = Task::factory()->forProject($project)->todo()->create();

    $response = $this->put(route('tasks.update', [$project, $task]), [
        'title' => $task->title,
        'type' => $task->type,
        'status' => 'done',
    ]);

    $response->assertRedirect();
    $task->refresh();
    expect($task->status)->toBe('done');
    expect($task->isDone())->toBeTrue();
});

test('task can have past due date when updating', function () {
    $project = Project::factory()->create();
    $task = Task::factory()->forProject($project)->create();

    $response = $this->put(route('tasks.update', [$project, $task]), [
        'title' => $task->title,
        'type' => $task->type,
        'status' => $task->status,
        'due_date' => now()->subDays(5)->format('Y-m-d'),
    ]);

    // Update allows past dates (different from store)
    $response->assertRedirect();
    $response->assertSessionHas('success');
});

/* -----------------------------------------------------------------
 |  DESTROY
 |-----------------------------------------------------------------*/

test('task can be deleted', function () {
    $project = Project::factory()->create();
    $task = Task::factory()->forProject($project)->create();

    $response = $this->delete(route('tasks.destroy', [$project, $task]));

    $response->assertRedirect(route('projects.show', ['project' => $project, 'tab' => 'tasks']));
    $response->assertSessionHas('success');

    $this->assertDatabaseMissing('tasks', ['id' => $task->id]);
});
