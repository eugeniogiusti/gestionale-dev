<?php

use App\Models\Project;
use App\Queries\Projects\ProjectStatsQuery;

test('stats query returns correct total count', function () {
    Project::factory()->count(5)->create();

    $stats = (new ProjectStatsQuery())->handle();

    expect($stats['total'])->toBe(5);
});

test('stats query returns correct count by status', function () {
    Project::factory()->draft()->count(2)->create();
    Project::factory()->inProgress()->count(3)->create();
    Project::factory()->completed()->count(4)->create();
    Project::factory()->archived()->count(1)->create();

    $stats = (new ProjectStatsQuery())->handle();

    expect($stats['draft'])->toBe(2);
    expect($stats['in_progress'])->toBe(3);
    expect($stats['completed'])->toBe(4);
    expect($stats['archived'])->toBe(1);
});

test('stats query returns zero for empty database', function () {
    $stats = (new ProjectStatsQuery())->handle();

    expect($stats['total'])->toBe(0);
    expect($stats['draft'])->toBe(0);
    expect($stats['in_progress'])->toBe(0);
    expect($stats['completed'])->toBe(0);
    expect($stats['archived'])->toBe(0);
    expect($stats['in_progress_percentage'])->toBe(0);
    expect($stats['archived_percentage'])->toBe(0);
});

test('stats query calculates correct percentages', function () {
    Project::factory()->draft()->count(2)->create();
    Project::factory()->inProgress()->count(4)->create();
    Project::factory()->completed()->count(2)->create();
    Project::factory()->archived()->count(2)->create();

    $stats = (new ProjectStatsQuery())->handle();

    // 4 in_progress out of 10 = 40%
    expect($stats['in_progress_percentage'])->toEqual(40);
    // 2 archived out of 10 = 20%
    expect($stats['archived_percentage'])->toEqual(20);
});

test('stats query counts new projects this month', function () {
    // Create projects this month
    Project::factory()->count(3)->create([
        'created_at' => now(),
    ]);

    // Create projects from last month
    Project::factory()->count(2)->create([
        'created_at' => now()->subMonth(),
    ]);

    $stats = (new ProjectStatsQuery())->handle();

    expect($stats['new_this_month'])->toBe(3);
});

test('stats query counts completed projects this week', function () {
    // Completed projects this week
    Project::factory()->completed()->count(2)->create([
        'updated_at' => now(),
    ]);

    // Completed projects last week
    Project::factory()->completed()->count(1)->create([
        'updated_at' => now()->subWeek(),
    ]);

    // In progress projects (not completed)
    Project::factory()->inProgress()->count(3)->create();

    $stats = (new ProjectStatsQuery())->handle();

    expect($stats['completed_this_week'])->toBe(2);
});
