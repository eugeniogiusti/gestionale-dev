<?php

use App\Models\Meeting;
use App\Models\Project;

/* -----------------------------------------------------------------
 |  SCOPES
 |-----------------------------------------------------------------*/

test('status scope filters by status', function () {
    Meeting::factory()->scheduled()->count(2)->create();
    Meeting::factory()->completed()->count(3)->create();
    Meeting::factory()->cancelled()->count(1)->create();

    expect(Meeting::status('scheduled')->count())->toBe(2);
    expect(Meeting::status('completed')->count())->toBe(3);
    expect(Meeting::status('cancelled')->count())->toBe(1);
});

test('scheduled scope returns only scheduled meetings', function () {
    Meeting::factory()->scheduled()->count(2)->create();
    Meeting::factory()->completed()->count(3)->create();

    expect(Meeting::scheduled()->count())->toBe(2);
});

test('upcoming scope returns future scheduled meetings', function () {
    Meeting::factory()->create([
        'status' => 'scheduled',
        'scheduled_at' => now()->addDays(5),
    ]);
    Meeting::factory()->create([
        'status' => 'scheduled',
        'scheduled_at' => now()->subDays(5),
    ]);
    Meeting::factory()->create([
        'status' => 'completed',
        'scheduled_at' => now()->addDays(5),
    ]);

    expect(Meeting::upcoming()->count())->toBe(1);
});

test('today scope returns meetings scheduled for today', function () {
    Meeting::factory()->create(['scheduled_at' => now()->setHour(14)]);
    Meeting::factory()->create(['scheduled_at' => now()->addDay()]);
    Meeting::factory()->create(['scheduled_at' => now()->subDay()]);

    expect(Meeting::today()->count())->toBe(1);
});

test('thisWeek scope returns meetings scheduled for this week', function () {
    Meeting::factory()->create(['scheduled_at' => now()->startOfWeek()->addDays(2)]);
    Meeting::factory()->create(['scheduled_at' => now()->startOfWeek()->addDays(4)]);
    Meeting::factory()->create(['scheduled_at' => now()->addWeeks(2)]);

    expect(Meeting::thisWeek()->count())->toBe(2);
});

test('past scope returns meetings in the past', function () {
    Meeting::factory()->create(['scheduled_at' => now()->subDays(5)]);
    Meeting::factory()->create(['scheduled_at' => now()->subDays(10)]);
    Meeting::factory()->create(['scheduled_at' => now()->addDays(5)]);

    expect(Meeting::past()->count())->toBe(2);
});

test('forProject scope filters by project', function () {
    $project = Project::factory()->create();
    Meeting::factory()->forProject($project)->count(2)->create();
    Meeting::factory()->count(3)->create();

    expect(Meeting::forProject($project->id)->count())->toBe(2);
});

/* -----------------------------------------------------------------
 |  RELATIONSHIPS
 |-----------------------------------------------------------------*/

test('meeting belongs to project', function () {
    $project = Project::factory()->create();
    $meeting = Meeting::factory()->forProject($project)->create();

    expect($meeting->project)->toBeInstanceOf(Project::class);
    expect($meeting->project->id)->toBe($project->id);
});

/* -----------------------------------------------------------------
 |  HELPERS
 |-----------------------------------------------------------------*/

test('isUpcoming returns true for future scheduled meeting', function () {
    $meeting = Meeting::factory()->create([
        'status' => 'scheduled',
        'scheduled_at' => now()->addDays(5),
    ]);

    expect($meeting->isUpcoming())->toBeTrue();
});

test('isUpcoming returns false for past meeting', function () {
    $meeting = Meeting::factory()->create([
        'status' => 'scheduled',
        'scheduled_at' => now()->subDays(5),
    ]);

    expect($meeting->isUpcoming())->toBeFalse();
});

test('isUpcoming returns false for non-scheduled status', function () {
    $meeting = Meeting::factory()->create([
        'status' => 'completed',
        'scheduled_at' => now()->addDays(5),
    ]);

    expect($meeting->isUpcoming())->toBeFalse();
});

test('isPast returns true for past meeting', function () {
    $meeting = Meeting::factory()->create([
        'scheduled_at' => now()->subDays(5),
    ]);

    expect($meeting->isPast())->toBeTrue();
});

test('isPast returns false for future meeting', function () {
    $meeting = Meeting::factory()->create([
        'scheduled_at' => now()->addDays(5),
    ]);

    expect($meeting->isPast())->toBeFalse();
});

test('isCompleted returns true for completed status', function () {
    $meeting = Meeting::factory()->completed()->create();

    expect($meeting->isCompleted())->toBeTrue();
});

test('isCompleted returns false for non-completed status', function () {
    $meeting = Meeting::factory()->scheduled()->create();

    expect($meeting->isCompleted())->toBeFalse();
});

test('isCancelled returns true for cancelled status', function () {
    $meeting = Meeting::factory()->cancelled()->create();

    expect($meeting->isCancelled())->toBeTrue();
});

test('isCancelled returns false for non-cancelled status', function () {
    $meeting = Meeting::factory()->scheduled()->create();

    expect($meeting->isCancelled())->toBeFalse();
});

test('getEndTime returns correct end time', function () {
    $meeting = Meeting::factory()->create([
        'scheduled_at' => now()->setHour(10)->setMinute(0)->setSecond(0),
        'duration_minutes' => 90,
    ]);

    $endTime = $meeting->getEndTime();

    expect($endTime->hour)->toBe(11);
    expect($endTime->minute)->toBe(30);
});

/* -----------------------------------------------------------------
 |  CALENDAR
 |-----------------------------------------------------------------*/

test('hasCalendarDate returns true when scheduled_at is set', function () {
    $meeting = Meeting::factory()->create([
        'scheduled_at' => now()->addDays(5),
    ]);

    expect($meeting->hasCalendarDate())->toBeTrue();
});

test('hasCalendarDate returns false when scheduled_at is null', function () {
    $meeting = new Meeting();

    expect($meeting->hasCalendarDate())->toBeFalse();
});

test('googleCalendarUrl returns url when scheduled_at is set', function () {
    $meeting = Meeting::factory()->create([
        'scheduled_at' => now()->addDays(5),
    ]);

    $url = $meeting->googleCalendarUrl();

    expect($url)->toBeString();
    expect($url)->toContain('calendar.google.com');
});

test('googleCalendarUrl returns null when scheduled_at is null', function () {
    $meeting = new Meeting();

    expect($meeting->googleCalendarUrl())->toBeNull();
});

/* -----------------------------------------------------------------
 |  CONSTANTS
 |-----------------------------------------------------------------*/

test('STATUSES constant contains valid statuses', function () {
    expect(Meeting::STATUSES)->toContain('scheduled');
    expect(Meeting::STATUSES)->toContain('completed');
    expect(Meeting::STATUSES)->toContain('cancelled');
});

/* -----------------------------------------------------------------
 |  FILLABLE
 |-----------------------------------------------------------------*/

test('meeting has correct fillable attributes', function () {
    $meeting = new Meeting();

    expect($meeting->getFillable())->toContain('project_id');
    expect($meeting->getFillable())->toContain('title');
    expect($meeting->getFillable())->toContain('description');
    expect($meeting->getFillable())->toContain('scheduled_at');
    expect($meeting->getFillable())->toContain('duration_minutes');
    expect($meeting->getFillable())->toContain('location');
    expect($meeting->getFillable())->toContain('meeting_url');
    expect($meeting->getFillable())->toContain('status');
    expect($meeting->getFillable())->toContain('notes');
});

/* -----------------------------------------------------------------
 |  CASTS
 |-----------------------------------------------------------------*/

test('scheduled_at is cast to datetime', function () {
    $meeting = Meeting::factory()->create([
        'scheduled_at' => '2025-06-15 14:30:00',
    ]);

    expect($meeting->scheduled_at)->toBeInstanceOf(\Illuminate\Support\Carbon::class);
});

/* -----------------------------------------------------------------
 |  FACTORY
 |-----------------------------------------------------------------*/

test('meeting factory creates valid meeting', function () {
    $meeting = Meeting::factory()->create();

    expect($meeting)->toBeInstanceOf(Meeting::class);
    expect($meeting->id)->not->toBeNull();
    expect($meeting->project_id)->not->toBeNull();
    expect($meeting->title)->not->toBeNull();
    expect($meeting->scheduled_at)->not->toBeNull();
    expect($meeting->status)->toBeIn(Meeting::STATUSES);
});

test('meeting factory minimal state creates meeting with only required fields', function () {
    $meeting = Meeting::factory()->minimal()->create();

    expect($meeting->title)->not->toBeNull();
    expect($meeting->description)->toBeNull();
    expect($meeting->scheduled_at)->not->toBeNull();
    expect($meeting->duration_minutes)->toBe(60);
    expect($meeting->location)->toBeNull();
    expect($meeting->meeting_url)->toBeNull();
    expect($meeting->status)->toBe('scheduled');
    expect($meeting->notes)->toBeNull();
});

test('meeting factory upcoming state creates future scheduled meeting', function () {
    $meeting = Meeting::factory()->upcoming()->create();

    expect($meeting->status)->toBe('scheduled');
    expect($meeting->scheduled_at->isFuture())->toBeTrue();
});

test('meeting factory completed state creates past completed meeting', function () {
    $meeting = Meeting::factory()->completed()->create();

    expect($meeting->status)->toBe('completed');
    expect($meeting->scheduled_at->isPast())->toBeTrue();
});
