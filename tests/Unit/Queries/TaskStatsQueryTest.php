<?php

use App\Models\Task;
use App\Queries\Tasks\TaskStatsQuery;

test('stats query returns correct todo count', function () {
    Task::factory()->todo()->count(3)->create();
    Task::factory()->inProgress()->count(2)->create();

    $stats = (new TaskStatsQuery())->handle();

    expect($stats['todo'])->toBe(3);
});

test('stats query returns correct in_progress count', function () {
    Task::factory()->todo()->count(2)->create();
    Task::factory()->inProgress()->count(4)->create();

    $stats = (new TaskStatsQuery())->handle();

    expect($stats['in_progress'])->toBe(4);
});

test('stats query returns correct blocked count', function () {
    Task::factory()->todo()->count(2)->create();
    Task::factory()->blocked()->count(3)->create();

    $stats = (new TaskStatsQuery())->handle();

    expect($stats['blocked'])->toBe(3);
});

test('stats query returns correct open bugs count', function () {
    // Open bugs (type=bug, status != done)
    Task::factory()->bug()->todo()->count(2)->create();
    Task::factory()->bug()->inProgress()->count(1)->create();
    Task::factory()->bug()->blocked()->count(1)->create();

    // Closed bug
    Task::factory()->bug()->done()->count(3)->create();

    // Open features (not bugs)
    Task::factory()->feature()->todo()->count(2)->create();

    $stats = (new TaskStatsQuery())->handle();

    // 2 + 1 + 1 = 4 open bugs
    expect($stats['bugs_open'])->toBe(4);
});

test('stats query returns zero for empty database', function () {
    $stats = (new TaskStatsQuery())->handle();

    expect($stats['todo'])->toBe(0);
    expect($stats['in_progress'])->toBe(0);
    expect($stats['blocked'])->toBe(0);
    expect($stats['bugs_open'])->toBe(0);
});

test('stats query returns all expected keys', function () {
    $stats = (new TaskStatsQuery())->handle();

    expect($stats)->toHaveKeys(['todo', 'in_progress', 'blocked', 'bugs_open']);
});
