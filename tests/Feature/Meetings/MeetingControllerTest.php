<?php

use App\Models\Meeting;
use App\Models\Project;
use App\Models\User;

beforeEach(function () {
    $this->user = User::factory()->create();
    $this->actingAs($this->user);
});

/* -----------------------------------------------------------------
 |  INDEX
 |-----------------------------------------------------------------*/

test('meetings index page is displayed', function () {
    Meeting::factory()->count(3)->create();

    $response = $this->get(route('meetings.index'));

    $response->assertStatus(200);
    $response->assertViewIs('meetings.index');
    $response->assertViewHas('meetings');
    $response->assertViewHas('stats');
});

test('meetings index can filter by status', function () {
    Meeting::factory()->scheduled()->count(2)->create();
    Meeting::factory()->completed()->count(3)->create();

    $response = $this->get(route('meetings.index', ['status' => 'scheduled']));

    $response->assertStatus(200);
    $meetings = $response->viewData('meetings');
    expect($meetings->count())->toBe(2);
});

test('meetings index can filter by project', function () {
    $project = Project::factory()->create();
    Meeting::factory()->forProject($project)->count(2)->create();
    Meeting::factory()->count(3)->create();

    $response = $this->get(route('meetings.index', ['project_id' => $project->id]));

    $response->assertStatus(200);
    $meetings = $response->viewData('meetings');
    expect($meetings->count())->toBe(2);
});

test('meetings index can filter by date range', function () {
    Meeting::factory()->create(['scheduled_at' => now()->addDays(5)]);
    Meeting::factory()->create(['scheduled_at' => now()->addDays(10)]);
    Meeting::factory()->create(['scheduled_at' => now()->addDays(30)]);

    $response = $this->get(route('meetings.index', [
        'date_from' => now()->addDays(3)->format('Y-m-d'),
        'date_to' => now()->addDays(15)->format('Y-m-d'),
    ]));

    $response->assertStatus(200);
    $meetings = $response->viewData('meetings');
    expect($meetings->count())->toBe(2);
});

test('meetings index can search by title', function () {
    Meeting::factory()->create(['title' => 'Weekly Sprint Planning']);
    Meeting::factory()->create(['title' => 'Client Demo']);

    $response = $this->get(route('meetings.index', ['search' => 'sprint']));

    $response->assertStatus(200);
    $meetings = $response->viewData('meetings');
    expect($meetings->count())->toBe(1);
});

test('meetings index can search by description', function () {
    Meeting::factory()->create(['description' => 'Discuss project timeline']);
    Meeting::factory()->create(['description' => 'Review budget']);

    $response = $this->get(route('meetings.index', ['search' => 'timeline']));

    $response->assertStatus(200);
    $meetings = $response->viewData('meetings');
    expect($meetings->count())->toBe(1);
});

test('guests cannot access meetings index', function () {
    auth()->logout();

    $response = $this->get(route('meetings.index'));

    $response->assertRedirect(route('login'));
});

/* -----------------------------------------------------------------
 |  STORE
 |-----------------------------------------------------------------*/

test('meeting can be created with valid data', function () {
    $project = Project::factory()->create();

    $response = $this->post(route('meetings.store', $project), [
        'title' => 'New Meeting',
        'scheduled_at' => now()->addDays(3)->format('Y-m-d H:i:s'),
    ]);

    $response->assertRedirect(route('projects.show', ['project' => $project, 'tab' => 'meetings']));
    $response->assertSessionHas('success');

    $this->assertDatabaseHas('meetings', [
        'project_id' => $project->id,
        'title' => 'New Meeting',
    ]);
});

test('meeting can be created with all fields', function () {
    $project = Project::factory()->create();

    $response = $this->post(route('meetings.store', $project), [
        'title' => 'Complete Meeting',
        'description' => 'This is a detailed description',
        'scheduled_at' => now()->addDays(7)->format('Y-m-d H:i:s'),
        'duration_minutes' => 90,
        'location' => 'Conference Room A',
        'meeting_url' => 'https://meet.google.com/abc-defg-hij',
        'notes' => 'Bring project documents',
    ]);

    $response->assertRedirect();
    $response->assertSessionHas('success');

    $this->assertDatabaseHas('meetings', [
        'project_id' => $project->id,
        'title' => 'Complete Meeting',
        'description' => 'This is a detailed description',
        'duration_minutes' => 90,
        'location' => 'Conference Room A',
        'meeting_url' => 'https://meet.google.com/abc-defg-hij',
        'notes' => 'Bring project documents',
    ]);
});

test('meeting cannot be created without required fields', function () {
    $project = Project::factory()->create();

    $response = $this->post(route('meetings.store', $project), []);

    $response->assertSessionHasErrors(['title', 'scheduled_at']);
});

test('meeting cannot be created with past date', function () {
    $project = Project::factory()->create();

    $response = $this->post(route('meetings.store', $project), [
        'title' => 'New Meeting',
        'scheduled_at' => now()->subDays(5)->format('Y-m-d H:i:s'),
    ]);

    $response->assertSessionHasErrors(['scheduled_at']);
});

test('meeting cannot be created with invalid duration', function () {
    $project = Project::factory()->create();

    $response = $this->post(route('meetings.store', $project), [
        'title' => 'New Meeting',
        'scheduled_at' => now()->addDays(3)->format('Y-m-d H:i:s'),
        'duration_minutes' => 10, // Min is 15
    ]);

    $response->assertSessionHasErrors(['duration_minutes']);
});

test('meeting cannot be created with duration over 8 hours', function () {
    $project = Project::factory()->create();

    $response = $this->post(route('meetings.store', $project), [
        'title' => 'New Meeting',
        'scheduled_at' => now()->addDays(3)->format('Y-m-d H:i:s'),
        'duration_minutes' => 500, // Max is 480 (8 hours)
    ]);

    $response->assertSessionHasErrors(['duration_minutes']);
});

test('meeting cannot be created with invalid url', function () {
    $project = Project::factory()->create();

    $response = $this->post(route('meetings.store', $project), [
        'title' => 'New Meeting',
        'scheduled_at' => now()->addDays(3)->format('Y-m-d H:i:s'),
        'meeting_url' => 'not-a-valid-url',
    ]);

    $response->assertSessionHasErrors(['meeting_url']);
});

test('meeting cannot be created with invalid status', function () {
    $project = Project::factory()->create();

    $response = $this->post(route('meetings.store', $project), [
        'title' => 'New Meeting',
        'scheduled_at' => now()->addDays(3)->format('Y-m-d H:i:s'),
        'status' => 'invalid_status',
    ]);

    $response->assertSessionHasErrors(['status']);
});

/* -----------------------------------------------------------------
 |  UPDATE
 |-----------------------------------------------------------------*/

test('meeting can be updated', function () {
    $project = Project::factory()->create();
    $meeting = Meeting::factory()->forProject($project)->create([
        'title' => 'Original Title',
    ]);

    $response = $this->put(route('meetings.update', [$project, $meeting]), [
        'title' => 'Updated Title',
        'scheduled_at' => now()->addDays(5)->format('Y-m-d H:i:s'),
    ]);

    $response->assertRedirect(route('projects.show', ['project' => $project, 'tab' => 'meetings']));
    $response->assertSessionHas('success');

    $meeting->refresh();
    expect($meeting->title)->toBe('Updated Title');
});

test('meeting can be updated with all fields', function () {
    $project = Project::factory()->create();
    $meeting = Meeting::factory()->forProject($project)->create();

    $response = $this->put(route('meetings.update', [$project, $meeting]), [
        'title' => 'Updated Meeting',
        'description' => 'Updated description',
        'scheduled_at' => now()->addDays(10)->format('Y-m-d H:i:s'),
        'duration_minutes' => 120,
        'location' => 'New Location',
        'meeting_url' => 'https://zoom.us/j/123456789',
        'status' => 'scheduled',
        'notes' => 'Updated notes',
    ]);

    $response->assertRedirect();
    $response->assertSessionHas('success');

    $meeting->refresh();
    expect($meeting->title)->toBe('Updated Meeting');
    expect($meeting->description)->toBe('Updated description');
    expect($meeting->duration_minutes)->toBe(120);
    expect($meeting->location)->toBe('New Location');
});

test('meeting can be updated with past date', function () {
    $project = Project::factory()->create();
    $meeting = Meeting::factory()->forProject($project)->create();

    $response = $this->put(route('meetings.update', [$project, $meeting]), [
        'title' => $meeting->title,
        'scheduled_at' => now()->subDays(5)->format('Y-m-d H:i:s'),
    ]);

    // Update allows past dates (different from store)
    $response->assertRedirect();
    $response->assertSessionHas('success');
});

/* -----------------------------------------------------------------
 |  DESTROY
 |-----------------------------------------------------------------*/

test('meeting can be deleted', function () {
    $project = Project::factory()->create();
    $meeting = Meeting::factory()->forProject($project)->create();

    $response = $this->delete(route('meetings.destroy', [$project, $meeting]));

    $response->assertRedirect(route('projects.show', ['project' => $project, 'tab' => 'meetings']));
    $response->assertSessionHas('success');

    $this->assertDatabaseMissing('meetings', ['id' => $meeting->id]);
});

/* -----------------------------------------------------------------
 |  MARK COMPLETED
 |-----------------------------------------------------------------*/

test('meeting can be marked as completed', function () {
    $project = Project::factory()->create();
    $meeting = Meeting::factory()->forProject($project)->scheduled()->create();

    $response = $this->post(route('meetings.complete', [$project, $meeting]));

    $response->assertRedirect(route('projects.show', ['project' => $project, 'tab' => 'meetings']));
    $response->assertSessionHas('success');

    $meeting->refresh();
    expect($meeting->status)->toBe('completed');
    expect($meeting->isCompleted())->toBeTrue();
});

/* -----------------------------------------------------------------
 |  MARK CANCELLED
 |-----------------------------------------------------------------*/

test('meeting can be marked as cancelled', function () {
    $project = Project::factory()->create();
    $meeting = Meeting::factory()->forProject($project)->scheduled()->create();

    $response = $this->post(route('meetings.cancel', [$project, $meeting]));

    $response->assertRedirect(route('projects.show', ['project' => $project, 'tab' => 'meetings']));
    $response->assertSessionHas('success');

    $meeting->refresh();
    expect($meeting->status)->toBe('cancelled');
    expect($meeting->isCancelled())->toBeTrue();
});
