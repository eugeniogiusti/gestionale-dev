<?php

use App\Models\Meeting;
use App\Models\Project;
use App\Queries\Meetings\MeetingIndexQuery;

test('index query returns paginated results', function () {
    Meeting::factory()->count(20)->create();

    $result = (new MeetingIndexQuery())->handle();

    expect($result)->toBeInstanceOf(\Illuminate\Pagination\LengthAwarePaginator::class);
    expect($result->count())->toBe(15); // Default pagination
    expect($result->total())->toBe(20);
});

test('index query filters by status', function () {
    Meeting::factory()->scheduled()->count(3)->create();
    Meeting::factory()->completed()->count(2)->create();

    request()->merge(['status' => 'scheduled']);

    $result = (new MeetingIndexQuery())->handle();

    expect($result->total())->toBe(3);
});

test('index query filters by project_id', function () {
    $project = Project::factory()->create();
    Meeting::factory()->forProject($project)->count(3)->create();
    Meeting::factory()->count(2)->create();

    request()->merge(['project_id' => $project->id]);

    $result = (new MeetingIndexQuery())->handle();

    expect($result->total())->toBe(3);
});

test('index query filters by date_from', function () {
    Meeting::factory()->create(['scheduled_at' => now()->addDays(5)]);
    Meeting::factory()->create(['scheduled_at' => now()->addDays(10)]);
    Meeting::factory()->create(['scheduled_at' => now()->addDays(2)]);

    request()->merge(['date_from' => now()->addDays(4)->format('Y-m-d')]);

    $result = (new MeetingIndexQuery())->handle();

    expect($result->total())->toBe(2);
});

test('index query filters by date_to', function () {
    Meeting::factory()->create(['scheduled_at' => now()->addDays(5)]);
    Meeting::factory()->create(['scheduled_at' => now()->addDays(10)]);
    Meeting::factory()->create(['scheduled_at' => now()->addDays(2)]);

    request()->merge(['date_to' => now()->addDays(6)->format('Y-m-d')]);

    $result = (new MeetingIndexQuery())->handle();

    expect($result->total())->toBe(2);
});

test('index query filters by date range', function () {
    Meeting::factory()->create(['scheduled_at' => now()->addDays(5)]);
    Meeting::factory()->create(['scheduled_at' => now()->addDays(10)]);
    Meeting::factory()->create(['scheduled_at' => now()->addDays(15)]);
    Meeting::factory()->create(['scheduled_at' => now()->addDays(2)]);

    request()->merge([
        'date_from' => now()->addDays(4)->format('Y-m-d'),
        'date_to' => now()->addDays(12)->format('Y-m-d'),
    ]);

    $result = (new MeetingIndexQuery())->handle();

    expect($result->total())->toBe(2);
});

test('index query searches by title', function () {
    Meeting::factory()->create(['title' => 'Weekly Sprint Planning']);
    Meeting::factory()->create(['title' => 'Client Demo']);
    Meeting::factory()->create(['title' => 'Team Standup']);

    request()->merge(['search' => 'sprint']);

    $result = (new MeetingIndexQuery())->handle();

    expect($result->total())->toBe(1);
    expect($result->first()->title)->toBe('Weekly Sprint Planning');
});

test('index query searches by description', function () {
    Meeting::factory()->create(['description' => 'Discuss project timeline']);
    Meeting::factory()->create(['description' => 'Review budget']);

    request()->merge(['search' => 'timeline']);

    $result = (new MeetingIndexQuery())->handle();

    expect($result->total())->toBe(1);
});

test('index query searches by project name', function () {
    $projectAlpha = Project::factory()->create(['name' => 'Alpha Project']);
    $projectBeta = Project::factory()->create(['name' => 'Beta Project']);

    Meeting::factory()->forProject($projectAlpha)->count(2)->create();
    Meeting::factory()->forProject($projectBeta)->count(3)->create();

    request()->merge(['search' => 'Alpha']);

    $result = (new MeetingIndexQuery())->handle();

    expect($result->total())->toBe(2);
    expect($result->pluck('project_id')->unique()->values()->all())->toBe([$projectAlpha->id]);
});

test('index query eager loads project and client relationships', function () {
    Meeting::factory()->count(3)->create();

    $result = (new MeetingIndexQuery())->handle();

    expect($result->first()->relationLoaded('project'))->toBeTrue();
    expect($result->first()->project->relationLoaded('client'))->toBeTrue();
});

test('index query orders by scheduled_at desc', function () {
    $meeting1 = Meeting::factory()->create(['scheduled_at' => now()->addDays(5)]);
    $meeting2 = Meeting::factory()->create(['scheduled_at' => now()->addDays(10)]);
    $meeting3 = Meeting::factory()->create(['scheduled_at' => now()->addDays(2)]);

    $result = (new MeetingIndexQuery())->handle();

    // Latest scheduled first
    expect($result->items()[0]->id)->toBe($meeting2->id);
    expect($result->items()[1]->id)->toBe($meeting1->id);
    expect($result->items()[2]->id)->toBe($meeting3->id);
});

test('index query combines multiple filters', function () {
    $project = Project::factory()->create();

    // Matches all filters
    Meeting::factory()->forProject($project)->create([
        'title' => 'Important Meeting',
        'status' => 'scheduled',
        'scheduled_at' => now()->addDays(5),
    ]);

    // Wrong project
    Meeting::factory()->create([
        'title' => 'Other Meeting',
        'status' => 'scheduled',
        'scheduled_at' => now()->addDays(5),
    ]);

    // Wrong status
    Meeting::factory()->forProject($project)->create([
        'status' => 'completed',
        'scheduled_at' => now()->addDays(5),
    ]);

    // Wrong date
    Meeting::factory()->forProject($project)->create([
        'status' => 'scheduled',
        'scheduled_at' => now()->addDays(15),
    ]);

    request()->merge([
        'project_id' => $project->id,
        'status' => 'scheduled',
        'date_from' => now()->addDays(3)->format('Y-m-d'),
        'date_to' => now()->addDays(10)->format('Y-m-d'),
    ]);

    $result = (new MeetingIndexQuery())->handle();

    expect($result->total())->toBe(1);
    expect($result->first()->title)->toBe('Important Meeting');
});
