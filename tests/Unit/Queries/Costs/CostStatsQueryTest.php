<?php

use App\Models\Cost;
use App\Queries\Costs\CostStatsQuery;

test('stats query returns array with expected keys', function () {
    $result = (new CostStatsQuery())->handle();

    expect($result)->toHaveKeys(['total_all_time', 'total_this_month', 'total_this_year', 'recurring_monthly']);
});

test('stats query calculates total all time in EUR', function () {
    Cost::factory()->withCurrency('EUR')->count(3)->create(['amount' => 100]);
    Cost::factory()->withCurrency('USD')->count(2)->create(['amount' => 50]);

    $result = (new CostStatsQuery())->handle();

    expect($result['total_all_time'])->toBe(300.0);
});

test('stats query calculates total this month in EUR', function () {
    // This month
    Cost::factory()->withCurrency('EUR')->paidThisMonth()->count(2)->create(['amount' => 150]);

    // Last month
    Cost::factory()->withCurrency('EUR')->create([
        'amount' => 200,
        'paid_at' => now()->subMonth(),
    ]);

    // This month but USD
    Cost::factory()->withCurrency('USD')->paidThisMonth()->create(['amount' => 100]);

    $result = (new CostStatsQuery())->handle();

    expect($result['total_this_month'])->toBe(300.0);
});

test('stats query calculates total this year in EUR', function () {
    // This year
    Cost::factory()->withCurrency('EUR')->paidThisYear()->count(2)->create(['amount' => 200]);

    // Last year
    Cost::factory()->withCurrency('EUR')->create([
        'amount' => 500,
        'paid_at' => now()->subYear(),
    ]);

    // This year but USD
    Cost::factory()->withCurrency('USD')->paidThisYear()->create(['amount' => 100]);

    $result = (new CostStatsQuery())->handle();

    expect($result['total_this_year'])->toBe(400.0);
});

test('stats query calculates recurring monthly costs in EUR', function () {
    // Recurring monthly in EUR
    Cost::factory()->withCurrency('EUR')->recurring('monthly')->count(3)->create(['amount' => 50]);

    // Recurring yearly in EUR (not monthly)
    Cost::factory()->withCurrency('EUR')->recurring('yearly')->count(2)->create(['amount' => 100]);

    // Recurring monthly in USD (different currency)
    Cost::factory()->withCurrency('USD')->recurring('monthly')->create(['amount' => 50]);

    // One-time in EUR (not recurring)
    Cost::factory()->withCurrency('EUR')->oneTime()->count(2)->create(['amount' => 200]);

    $result = (new CostStatsQuery())->handle();

    expect($result['recurring_monthly'])->toBe(150.0);
});

test('stats query returns zeros when no costs exist', function () {
    $result = (new CostStatsQuery())->handle();

    expect($result['total_all_time'])->toBe(0.0);
    expect($result['total_this_month'])->toBe(0.0);
    expect($result['total_this_year'])->toBe(0.0);
    expect($result['recurring_monthly'])->toBe(0.0);
});

test('stats query returns zeros when no EUR costs exist', function () {
    // Only USD costs
    Cost::factory()->withCurrency('USD')->count(5)->create(['amount' => 100]);

    $result = (new CostStatsQuery())->handle();

    expect($result['total_all_time'])->toBe(0.0);
});

test('stats query handles decimal amounts correctly', function () {
    Cost::factory()->withCurrency('EUR')->create(['amount' => 99.99]);
    Cost::factory()->withCurrency('EUR')->create(['amount' => 49.50]);
    Cost::factory()->withCurrency('EUR')->create(['amount' => 25.51]);

    $result = (new CostStatsQuery())->handle();

    expect($result['total_all_time'])->toBe(175.0);
});
