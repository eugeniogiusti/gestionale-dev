<?php

use App\Models\Cost;
use App\Models\Project;

// ==========================================
// CURRENCY SYMBOL TESTS
// ==========================================

test('getCurrencySymbol returns correct symbols', function () {
    $currencies = [
        'EUR' => '€',
        'USD' => '$',
        'GBP' => '£',
        'CHF' => 'CHF',
        'JPY' => '¥',
    ];

    foreach ($currencies as $currency => $symbol) {
        $cost = Cost::factory()->make(['currency' => $currency]);
        expect($cost->getCurrencySymbol())->toBe($symbol);
    }
});

test('getCurrencySymbol returns currency code for unknown currencies', function () {
    $cost = Cost::factory()->make(['currency' => 'XYZ']);
    expect($cost->getCurrencySymbol())->toBe('XYZ');
});

// ==========================================
// FORMATTED AMOUNT TESTS
// ==========================================

test('getFormattedAmount returns formatted amount with symbol', function () {
    $cost = Cost::factory()->make(['amount' => 1500.50, 'currency' => 'EUR']);
    expect($cost->getFormattedAmount())->toBe('€ 1.500,50');

    $cost = Cost::factory()->make(['amount' => 99.99, 'currency' => 'USD']);
    expect($cost->getFormattedAmount())->toBe('$ 99,99');
});

// ==========================================
// RECENT CHECK TESTS
// ==========================================

test('isRecent returns true for costs paid within last 7 days', function () {
    $cost = Cost::factory()->make(['paid_at' => now()->subDays(3)]);
    expect($cost->isRecent())->toBeTrue();
});

test('isRecent returns false for costs paid more than 7 days ago', function () {
    $cost = Cost::factory()->make(['paid_at' => now()->subDays(10)]);
    expect($cost->isRecent())->toBeFalse();
});

// ==========================================
// RECEIPT HELPER TESTS
// ==========================================

test('hasReceipt returns true when receipt_path is set', function () {
    $cost = Cost::factory()->make(['receipt_path' => 'receipts/test.pdf']);
    expect($cost->hasReceipt())->toBeTrue();
});

test('hasReceipt returns false when receipt_path is null', function () {
    $cost = Cost::factory()->make(['receipt_path' => null]);
    expect($cost->hasReceipt())->toBeFalse();
});

// ==========================================
// SCOPE TESTS
// ==========================================

test('type scope filters by type', function () {
    $project = Project::factory()->create();
    Cost::factory()->forProject($project)->withType('hosting')->count(2)->create();
    Cost::factory()->forProject($project)->withType('api')->count(3)->create();

    $hostingCosts = Cost::type('hosting')->get();

    expect($hostingCosts)->toHaveCount(2);
    expect($hostingCosts->every(fn ($c) => $c->type === 'hosting'))->toBeTrue();
});

test('currency scope filters by currency', function () {
    $project = Project::factory()->create();
    Cost::factory()->forProject($project)->withCurrency('EUR')->count(2)->create();
    Cost::factory()->forProject($project)->withCurrency('USD')->count(3)->create();

    $eurCosts = Cost::currency('EUR')->get();

    expect($eurCosts)->toHaveCount(2);
    expect($eurCosts->every(fn ($c) => $c->currency === 'EUR'))->toBeTrue();
});

test('recurring scope filters by recurring status', function () {
    $project = Project::factory()->create();
    Cost::factory()->forProject($project)->recurring()->count(2)->create();
    Cost::factory()->forProject($project)->oneTime()->count(3)->create();

    $recurringCosts = Cost::recurring(true)->get();
    $oneTimeCosts = Cost::recurring(false)->get();

    expect($recurringCosts)->toHaveCount(2);
    expect($oneTimeCosts)->toHaveCount(3);
});

test('forProject scope filters by project', function () {
    $project1 = Project::factory()->create();
    $project2 = Project::factory()->create();
    Cost::factory()->forProject($project1)->count(2)->create();
    Cost::factory()->forProject($project2)->count(3)->create();

    $project1Costs = Cost::forProject($project1->id)->get();

    expect($project1Costs)->toHaveCount(2);
});

test('thisMonth scope returns costs paid this month', function () {
    $project = Project::factory()->create();

    Cost::factory()->forProject($project)->create([
        'paid_at' => now()->startOfMonth()->addDays(5),
    ]);
    Cost::factory()->forProject($project)->create([
        'paid_at' => now()->subMonth(),
    ]);

    $thisMonthCosts = Cost::thisMonth()->get();

    expect($thisMonthCosts)->toHaveCount(1);
});

test('thisYear scope returns costs paid this year', function () {
    $project = Project::factory()->create();

    Cost::factory()->forProject($project)->create([
        'paid_at' => now()->startOfYear()->addDays(30),
    ]);
    Cost::factory()->forProject($project)->create([
        'paid_at' => now()->subYear(),
    ]);

    $thisYearCosts = Cost::thisYear()->get();

    expect($thisYearCosts)->toHaveCount(1);
});

test('dateRange scope filters by date range', function () {
    $project = Project::factory()->create();

    Cost::factory()->forProject($project)->create([
        'paid_at' => now()->subDays(5),
    ]);
    Cost::factory()->forProject($project)->create([
        'paid_at' => now()->subDays(15),
    ]);
    Cost::factory()->forProject($project)->create([
        'paid_at' => now()->subDays(30),
    ]);

    $rangeCosts = Cost::dateRange(now()->subDays(20), now())->get();

    expect($rangeCosts)->toHaveCount(2);
});

// ==========================================
// RELATIONSHIP TESTS
// ==========================================

test('cost belongs to a project', function () {
    $project = Project::factory()->create();
    $cost = Cost::factory()->forProject($project)->create();

    expect($cost->project)->toBeInstanceOf(Project::class);
    expect($cost->project->id)->toBe($project->id);
});

// ==========================================
// FILLABLE TESTS
// ==========================================

test('cost has correct fillable attributes', function () {
    $cost = new Cost();

    $expectedFillable = [
        'project_id',
        'amount',
        'currency',
        'type',
        'recurring',
        'recurring_period',
        'paid_at',
        'receipt_path',
        'notes',
    ];

    expect($cost->getFillable())->toBe($expectedFillable);
});

// ==========================================
// CASTS TESTS
// ==========================================

test('cost paid_at is cast correctly', function () {
    $project = Project::factory()->create();
    $cost = Cost::factory()->forProject($project)->create([
        'paid_at' => '2024-01-15',
    ]);

    expect($cost->paid_at)->toBeInstanceOf(\Carbon\Carbon::class);
});

test('cost amount is cast to decimal', function () {
    $project = Project::factory()->create();
    $cost = Cost::factory()->forProject($project)->create([
        'amount' => 1500.50,
    ]);

    expect($cost->amount)->toBe('1500.50');
});

test('cost recurring is cast to boolean', function () {
    $project = Project::factory()->create();
    $cost = Cost::factory()->forProject($project)->recurring()->create();

    expect($cost->recurring)->toBeBool();
    expect($cost->recurring)->toBeTrue();
});

// ==========================================
// CONSTANTS TESTS
// ==========================================

test('cost has correct types constant', function () {
    expect(Cost::TYPES)->toBe([
        'hosting',
        'api',
        'tool',
        'license',
        'ads',
        'service',
        'travel',
    ]);
});

test('cost has correct currencies constant', function () {
    expect(Cost::CURRENCIES)->toBe([
        'EUR' => '€',
        'USD' => '$',
        'GBP' => '£',
        'CHF' => 'CHF',
        'JPY' => '¥',
    ]);
});

test('cost has correct recurring periods constant', function () {
    expect(Cost::RECURRING_PERIODS)->toBe([
        'monthly',
        'yearly',
        'quarterly',
    ]);
});
