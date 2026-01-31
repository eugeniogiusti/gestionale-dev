<?php

use App\Models\Client;
use App\Queries\Clients\ClientStatsQuery;

test('stats query returns correct total count', function () {
    Client::factory()->count(5)->create();

    $stats = (new ClientStatsQuery())->handle();

    expect($stats['total'])->toBe(5);
});

test('stats query returns correct count by status', function () {
    Client::factory()->lead()->count(3)->create();
    Client::factory()->active()->count(2)->create();
    Client::factory()->archived()->count(1)->create();

    $stats = (new ClientStatsQuery())->handle();

    expect($stats['lead'])->toBe(3);
    expect($stats['active'])->toBe(2);
    expect($stats['archived'])->toBe(1);
});

test('stats query returns zero for empty database', function () {
    $stats = (new ClientStatsQuery())->handle();

    expect($stats['total'])->toBe(0);
    expect($stats['lead'])->toBe(0);
    expect($stats['active'])->toBe(0);
    expect($stats['archived'])->toBe(0);
    expect($stats['lead_percentage'])->toBe(0);
    expect($stats['archived_percentage'])->toBe(0);
});

test('stats query calculates correct percentages', function () {
    Client::factory()->lead()->count(2)->create();
    Client::factory()->active()->count(6)->create();
    Client::factory()->archived()->count(2)->create();

    $stats = (new ClientStatsQuery())->handle();

    // 2 leads out of 10 = 20%
    expect($stats['lead_percentage'])->toEqual(20);
    // 2 archived out of 10 = 20%
    expect($stats['archived_percentage'])->toEqual(20);
});

test('stats query counts new clients this month', function () {
    // Create clients this month
    Client::factory()->count(3)->create([
        'created_at' => now(),
    ]);

    // Create clients from last month
    Client::factory()->count(2)->create([
        'created_at' => now()->subMonth(),
    ]);

    $stats = (new ClientStatsQuery())->handle();

    expect($stats['new_this_month'])->toBe(3);
});

test('stats query counts converted clients this month', function () {
    // Active clients updated this month (considered "converted")
    Client::factory()->active()->count(2)->create([
        'updated_at' => now(),
    ]);

    // Active clients updated last month
    Client::factory()->active()->count(1)->create([
        'updated_at' => now()->subMonth(),
    ]);

    // Lead clients (not converted)
    Client::factory()->lead()->count(3)->create();

    $stats = (new ClientStatsQuery())->handle();

    expect($stats['converted_this_month'])->toBe(2);
});
