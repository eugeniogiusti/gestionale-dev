<?php

use App\Models\Meeting;
use App\Queries\Meetings\MeetingStatsQuery;

test('stats query returns array with expected keys', function () {
    $result = (new MeetingStatsQuery())->handle();

    expect($result)->toHaveKeys(['upcoming', 'today', 'this_week', 'completed_last_week']);
});

test('stats query counts upcoming meetings', function () {
    // Upcoming: scheduled and in the future
    Meeting::factory()->count(3)->create([
        'status' => 'scheduled',
        'scheduled_at' => now()->addDays(5),
    ]);

    // Not upcoming: completed
    Meeting::factory()->count(2)->create([
        'status' => 'completed',
        'scheduled_at' => now()->addDays(5),
    ]);

    // Not upcoming: past
    Meeting::factory()->count(2)->create([
        'status' => 'scheduled',
        'scheduled_at' => now()->subDays(5),
    ]);

    $result = (new MeetingStatsQuery())->handle();

    expect($result['upcoming'])->toBe(3);
});

test('stats query counts today meetings', function () {
    // Today and scheduled
    Meeting::factory()->count(2)->create([
        'status' => 'scheduled',
        'scheduled_at' => now()->setHour(14)->setMinute(0),
    ]);

    // Today but completed
    Meeting::factory()->create([
        'status' => 'completed',
        'scheduled_at' => now()->setHour(10)->setMinute(0),
    ]);

    // Not today
    Meeting::factory()->count(3)->create([
        'status' => 'scheduled',
        'scheduled_at' => now()->addDay(),
    ]);

    $result = (new MeetingStatsQuery())->handle();

    expect($result['today'])->toBe(2);
});

test('stats query counts this week meetings', function () {
    // This week and scheduled
    Meeting::factory()->count(3)->create([
        'status' => 'scheduled',
        'scheduled_at' => now()->startOfWeek()->addDays(2)->setHour(10),
    ]);

    // This week but completed
    Meeting::factory()->create([
        'status' => 'completed',
        'scheduled_at' => now()->startOfWeek()->addDays(1)->setHour(10),
    ]);

    // Not this week
    Meeting::factory()->count(2)->create([
        'status' => 'scheduled',
        'scheduled_at' => now()->addWeeks(2),
    ]);

    $result = (new MeetingStatsQuery())->handle();

    expect($result['this_week'])->toBe(3);
});

test('stats query counts completed last week meetings', function () {
    // Completed within last week
    Meeting::factory()->count(2)->create([
        'status' => 'completed',
        'scheduled_at' => now()->subDays(3),
    ]);

    // Completed but older than a week
    Meeting::factory()->create([
        'status' => 'completed',
        'scheduled_at' => now()->subDays(10),
    ]);

    // Within last week but not completed
    Meeting::factory()->create([
        'status' => 'scheduled',
        'scheduled_at' => now()->subDays(3),
    ]);

    $result = (new MeetingStatsQuery())->handle();

    expect($result['completed_last_week'])->toBe(2);
});

test('stats query returns zeros when no meetings exist', function () {
    $result = (new MeetingStatsQuery())->handle();

    expect($result['upcoming'])->toBe(0);
    expect($result['today'])->toBe(0);
    expect($result['this_week'])->toBe(0);
    expect($result['completed_last_week'])->toBe(0);
});
