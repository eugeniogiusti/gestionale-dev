<?php

use App\Models\Payment;
use App\Models\Project;

// ==========================================
// FORMAT COMPACT NUMBER TESTS
// ==========================================

test('formatCompactNumber returns full number for values under 1000', function () {
    expect(Payment::formatCompactNumber(0))->toBe('0,00');
    expect(Payment::formatCompactNumber(1))->toBe('1,00');
    expect(Payment::formatCompactNumber(500))->toBe('500,00');
    expect(Payment::formatCompactNumber(999.99))->toBe('999,99');
    expect(Payment::formatCompactNumber(500.25))->toBe('500,25');
});

test('formatCompactNumber returns K format for values 1000-999999', function () {
    expect(Payment::formatCompactNumber(1000))->toBe('1,00K');
    expect(Payment::formatCompactNumber(1500))->toBe('1,50K');
    expect(Payment::formatCompactNumber(15040))->toBe('15,04K');
    expect(Payment::formatCompactNumber(15040.50))->toBe('15,04K');
    expect(Payment::formatCompactNumber(999999))->toBe('1.000,00K');
});

test('formatCompactNumber returns M format for values 1000000+', function () {
    expect(Payment::formatCompactNumber(1000000))->toBe('1,00M');
    expect(Payment::formatCompactNumber(1234567.89))->toBe('1,23M');
    expect(Payment::formatCompactNumber(1050000))->toBe('1,05M');
    expect(Payment::formatCompactNumber(10500000))->toBe('10,50M');
});

test('formatCompactNumber preserves 2 decimal precision', function () {
    // K format
    expect(Payment::formatCompactNumber(15040))->toBe('15,04K');
    expect(Payment::formatCompactNumber(15999))->toBe('16,00K');
    expect(Payment::formatCompactNumber(1001))->toBe('1,00K');
    expect(Payment::formatCompactNumber(1009))->toBe('1,01K');

    // M format
    expect(Payment::formatCompactNumber(1010000))->toBe('1,01M');
    expect(Payment::formatCompactNumber(1004000))->toBe('1,00M');
});

// ==========================================
// GET COMPACT AMOUNT TESTS
// ==========================================

test('getCompactAmount includes currency symbol', function () {
    $payment = Payment::factory()->make(['amount' => 1500, 'currency' => 'EUR']);
    expect($payment->getCompactAmount())->toBe('€ 1,50K');

    $payment = Payment::factory()->make(['amount' => 1500, 'currency' => 'USD']);
    expect($payment->getCompactAmount())->toBe('$ 1,50K');

    $payment = Payment::factory()->make(['amount' => 1500, 'currency' => 'GBP']);
    expect($payment->getCompactAmount())->toBe('£ 1,50K');
});

test('getFormattedAmount returns full formatted amount', function () {
    $payment = Payment::factory()->make(['amount' => 15040.50, 'currency' => 'EUR']);
    expect($payment->getFormattedAmount())->toBe('€ 15.040,50');

    $payment = Payment::factory()->make(['amount' => 1234567.89, 'currency' => 'USD']);
    expect($payment->getFormattedAmount())->toBe('$ 1.234.567,89');
});

// ==========================================
// STATUS HELPER TESTS
// ==========================================

test('isPaid returns true when paid_at is set', function () {
    $payment = Payment::factory()->paid()->make();
    expect($payment->isPaid())->toBeTrue();
    expect($payment->isPending())->toBeFalse();
});

test('isPending returns true when paid_at is null', function () {
    $payment = Payment::factory()->pending()->make();
    expect($payment->isPending())->toBeTrue();
    expect($payment->isPaid())->toBeFalse();
});

test('isOverdue returns true for past due unpaid payments', function () {
    $payment = Payment::factory()->overdue()->make();
    expect($payment->isOverdue())->toBeTrue();
});

test('isOverdue returns false for paid payments', function () {
    $payment = Payment::factory()->paid()->make([
        'due_date' => now()->subDays(10),
    ]);
    expect($payment->isOverdue())->toBeFalse();
});

test('isOverdue returns false when due_date is in future', function () {
    $payment = Payment::factory()->pending()->make([
        'due_date' => now()->addDays(10),
    ]);
    expect($payment->isOverdue())->toBeFalse();
});

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
        $payment = Payment::factory()->make(['currency' => $currency]);
        expect($payment->getCurrencySymbol())->toBe($symbol);
    }
});

test('getCurrencySymbol returns currency code for unknown currencies', function () {
    $payment = Payment::factory()->make(['currency' => 'XYZ']);
    expect($payment->getCurrencySymbol())->toBe('XYZ');
});

// ==========================================
// INVOICE HELPER TESTS
// ==========================================

test('hasInvoice returns true when invoice_path is set', function () {
    $payment = Payment::factory()->make(['invoice_path' => 'invoices/test.pdf']);
    expect($payment->hasInvoice())->toBeTrue();
});

test('hasInvoice returns false when invoice_path is null', function () {
    $payment = Payment::factory()->make(['invoice_path' => null]);
    expect($payment->hasInvoice())->toBeFalse();
});

// ==========================================
// SCOPE TESTS
// ==========================================

test('paid scope returns only paid payments', function () {
    $project = Project::factory()->create();
    Payment::factory()->paid()->forProject($project)->count(2)->create();
    Payment::factory()->pending()->forProject($project)->count(3)->create();

    $paidPayments = Payment::paid()->get();

    expect($paidPayments)->toHaveCount(2);
    expect($paidPayments->every(fn ($p) => $p->paid_at !== null))->toBeTrue();
});

test('pending scope returns only pending payments', function () {
    $project = Project::factory()->create();
    Payment::factory()->paid()->forProject($project)->count(2)->create();
    Payment::factory()->pending()->forProject($project)->count(3)->create();

    $pendingPayments = Payment::pending()->get();

    expect($pendingPayments)->toHaveCount(3);
    expect($pendingPayments->every(fn ($p) => $p->paid_at === null))->toBeTrue();
});

test('overdue scope returns only overdue payments', function () {
    $project = Project::factory()->create();
    Payment::factory()->paid()->forProject($project)->count(2)->create();
    Payment::factory()->pending()->forProject($project)->create([
        'due_date' => now()->addDays(10), // Not overdue
    ]);
    Payment::factory()->overdue()->forProject($project)->count(2)->create();

    $overduePayments = Payment::overdue()->get();

    expect($overduePayments)->toHaveCount(2);
});

test('thisMonth scope returns payments paid this month', function () {
    $project = Project::factory()->create();

    Payment::factory()->forProject($project)->create([
        'paid_at' => now()->startOfMonth()->addDays(5),
    ]);
    Payment::factory()->forProject($project)->create([
        'paid_at' => now()->subMonth(),
    ]);

    $thisMonthPayments = Payment::thisMonth()->get();

    expect($thisMonthPayments)->toHaveCount(1);
});

test('thisYear scope returns payments paid this year', function () {
    $project = Project::factory()->create();

    Payment::factory()->forProject($project)->create([
        'paid_at' => now()->startOfYear()->addDays(30),
    ]);
    Payment::factory()->forProject($project)->create([
        'paid_at' => now()->subYear(),
    ]);

    $thisYearPayments = Payment::thisYear()->get();

    expect($thisYearPayments)->toHaveCount(1);
});

// ==========================================
// FILLABLE TESTS
// ==========================================

test('payment has correct fillable attributes', function () {
    $payment = new Payment();

    $expectedFillable = [
        'project_id',
        'amount',
        'currency',
        'paid_at',
        'due_date',
        'method',
        'reference',
        'notes',
        'invoice_path',
    ];

    expect($payment->getFillable())->toBe($expectedFillable);
});

// ==========================================
// CASTS TESTS
// ==========================================

test('payment dates are cast correctly', function () {
    $project = Project::factory()->create();
    $payment = Payment::factory()->forProject($project)->create([
        'paid_at' => '2024-01-15',
        'due_date' => '2024-02-15',
    ]);

    expect($payment->paid_at)->toBeInstanceOf(\Carbon\Carbon::class);
    expect($payment->due_date)->toBeInstanceOf(\Carbon\Carbon::class);
});

test('payment amount is cast to decimal', function () {
    $project = Project::factory()->create();
    $payment = Payment::factory()->forProject($project)->create([
        'amount' => 1500.50,
    ]);

    expect($payment->amount)->toBe('1500.50');
});
