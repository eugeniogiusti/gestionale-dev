<?php

use App\Models\Payment;
use App\Models\Project;
use App\Models\User;

beforeEach(function () {
    $this->user = User::factory()->create();
    $this->project = Project::factory()->create();
});

// ==========================================
// INDEX TESTS
// ==========================================

test('payments index page is displayed', function () {
    Payment::factory()->count(3)->forProject($this->project)->create();

    $response = $this
        ->actingAs($this->user)
        ->get(route('payments.index'));

    $response->assertOk();
    $response->assertViewIs('payments.index');
    $response->assertViewHas('payments');
    $response->assertViewHas('stats');
});

test('guests cannot access payments index', function () {
    $response = $this->get(route('payments.index'));

    $response->assertRedirect(route('login'));
});

// ==========================================
// STORE TESTS
// ==========================================

test('payment can be created with valid data (paid)', function () {
    $paymentData = [
        'amount' => 1500.50,
        'currency' => 'EUR',
        'paid_at' => now()->format('Y-m-d'),
        'method' => 'bank',
        'reference' => 'INV-2024-001',
        'notes' => 'First payment',
    ];

    $response = $this
        ->actingAs($this->user)
        ->post(route('payments.store', $this->project), $paymentData);

    $response->assertRedirect(route('projects.show', ['project' => $this->project, 'tab' => 'payments']));
    $response->assertSessionHas('success');

    $this->assertDatabaseHas('payments', [
        'project_id' => $this->project->id,
        'amount' => 1500.50,
        'currency' => 'EUR',
        'method' => 'bank',
        'reference' => 'INV-2024-001',
    ]);
});

test('payment can be created as pending (unpaid with due date)', function () {
    $paymentData = [
        'amount' => 2000.00,
        'currency' => 'USD',
        'due_date' => now()->addMonth()->format('Y-m-d'),
        'notes' => 'Pending invoice',
    ];

    $response = $this
        ->actingAs($this->user)
        ->post(route('payments.store', $this->project), $paymentData);

    $response->assertRedirect(route('projects.show', ['project' => $this->project, 'tab' => 'payments']));
    $response->assertSessionHas('success');

    $this->assertDatabaseHas('payments', [
        'project_id' => $this->project->id,
        'amount' => 2000.00,
        'currency' => 'USD',
        'paid_at' => null,
        'method' => null,
    ]);
});

test('payment cannot be created without required fields', function () {
    $response = $this
        ->actingAs($this->user)
        ->post(route('payments.store', $this->project), []);

    $response->assertSessionHasErrors(['amount', 'currency']);
});

test('payment cannot be created with invalid amount', function () {
    $response = $this
        ->actingAs($this->user)
        ->post(route('payments.store', $this->project), [
            'amount' => 0,
            'currency' => 'EUR',
            'due_date' => now()->addMonth()->format('Y-m-d'),
        ]);

    $response->assertSessionHasErrors('amount');
});

test('payment cannot be created with invalid currency', function () {
    $response = $this
        ->actingAs($this->user)
        ->post(route('payments.store', $this->project), [
            'amount' => 1000,
            'currency' => 'INVALID',
            'due_date' => now()->addMonth()->format('Y-m-d'),
        ]);

    $response->assertSessionHasErrors('currency');
});

test('payment cannot be created with invalid method', function () {
    $response = $this
        ->actingAs($this->user)
        ->post(route('payments.store', $this->project), [
            'amount' => 1000,
            'currency' => 'EUR',
            'paid_at' => now()->format('Y-m-d'),
            'method' => 'invalid_method',
        ]);

    $response->assertSessionHasErrors('method');
});

test('paid payment requires method', function () {
    $response = $this
        ->actingAs($this->user)
        ->post(route('payments.store', $this->project), [
            'amount' => 1000,
            'currency' => 'EUR',
            'paid_at' => now()->format('Y-m-d'),
            // method is missing
        ]);

    $response->assertSessionHasErrors('method');
});

test('unpaid payment requires due date', function () {
    $response = $this
        ->actingAs($this->user)
        ->post(route('payments.store', $this->project), [
            'amount' => 1000,
            'currency' => 'EUR',
            // no paid_at and no due_date
        ]);

    $response->assertSessionHasErrors('due_date');
});

test('guests cannot create payments', function () {
    $response = $this->post(route('payments.store', $this->project), [
        'amount' => 1000,
        'currency' => 'EUR',
        'due_date' => now()->addMonth()->format('Y-m-d'),
    ]);

    $response->assertRedirect(route('login'));
});

// ==========================================
// UPDATE TESTS
// ==========================================

test('payment can be updated', function () {
    $payment = Payment::factory()->paid()->forProject($this->project)->create([
        'amount' => 1000,
        'currency' => 'EUR',
    ]);

    $response = $this
        ->actingAs($this->user)
        ->put(route('payments.update', [$this->project, $payment]), [
            'amount' => 1500,
            'currency' => 'USD',
            'paid_at' => now()->format('Y-m-d'),
            'method' => 'stripe',
        ]);

    $response->assertRedirect(route('projects.show', ['project' => $this->project, 'tab' => 'payments']));
    $response->assertSessionHas('success');

    $payment->refresh();
    expect($payment->amount)->toBe('1500.00');
    expect($payment->currency)->toBe('USD');
    expect($payment->method)->toBe('stripe');
});

test('payment can be changed from pending to paid', function () {
    $payment = Payment::factory()->pending()->forProject($this->project)->create();

    $response = $this
        ->actingAs($this->user)
        ->put(route('payments.update', [$this->project, $payment]), [
            'amount' => $payment->amount,
            'currency' => $payment->currency,
            'paid_at' => now()->format('Y-m-d'),
            'method' => 'bank',
        ]);

    $response->assertRedirect(route('projects.show', ['project' => $this->project, 'tab' => 'payments']));

    $payment->refresh();
    expect($payment->isPaid())->toBeTrue();
    expect($payment->method)->toBe('bank');
});

test('payment cannot be updated with invalid data', function () {
    $payment = Payment::factory()->forProject($this->project)->create();

    $response = $this
        ->actingAs($this->user)
        ->put(route('payments.update', [$this->project, $payment]), [
            'amount' => -100,
            'currency' => 'INVALID',
        ]);

    $response->assertSessionHasErrors(['amount', 'currency']);
});

test('guests cannot update payments', function () {
    $payment = Payment::factory()->forProject($this->project)->create();

    $response = $this->put(route('payments.update', [$this->project, $payment]), [
        'amount' => 1000,
        'currency' => 'EUR',
        'due_date' => now()->addMonth()->format('Y-m-d'),
    ]);

    $response->assertRedirect(route('login'));
});

// ==========================================
// DELETE TESTS
// ==========================================

test('payment can be deleted', function () {
    $payment = Payment::factory()->forProject($this->project)->create();
    $paymentId = $payment->id;

    $response = $this
        ->actingAs($this->user)
        ->delete(route('payments.destroy', [$this->project, $payment]));

    $response->assertRedirect(route('projects.show', ['project' => $this->project, 'tab' => 'payments']));
    $response->assertSessionHas('success');

    $this->assertDatabaseMissing('payments', ['id' => $paymentId]);
});

test('guests cannot delete payments', function () {
    $payment = Payment::factory()->forProject($this->project)->create();

    $response = $this->delete(route('payments.destroy', [$this->project, $payment]));

    $response->assertRedirect(route('login'));
});

// ==========================================
// EDGE CASES
// ==========================================

test('payment with all currencies can be created', function () {
    $currencies = ['EUR', 'USD', 'GBP', 'CHF', 'JPY'];

    foreach ($currencies as $currency) {
        $response = $this
            ->actingAs($this->user)
            ->post(route('payments.store', $this->project), [
                'amount' => 1000,
                'currency' => $currency,
                'due_date' => now()->addMonth()->format('Y-m-d'),
            ]);

        $response->assertSessionHasNoErrors();
    }

    expect(Payment::where('project_id', $this->project->id)->count())->toBe(5);
});

test('payment with all methods can be created', function () {
    $methods = ['cash', 'bank', 'stripe', 'paypal'];

    foreach ($methods as $method) {
        $response = $this
            ->actingAs($this->user)
            ->post(route('payments.store', $this->project), [
                'amount' => 1000,
                'currency' => 'EUR',
                'paid_at' => now()->format('Y-m-d'),
                'method' => $method,
            ]);

        $response->assertSessionHasNoErrors();
    }

    expect(Payment::where('project_id', $this->project->id)->count())->toBe(4);
});

test('payment amount respects max limit', function () {
    $response = $this
        ->actingAs($this->user)
        ->post(route('payments.store', $this->project), [
            'amount' => 1000000,
            'currency' => 'EUR',
            'due_date' => now()->addMonth()->format('Y-m-d'),
        ]);

    $response->assertSessionHasErrors('amount');
});
