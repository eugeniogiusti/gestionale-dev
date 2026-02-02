<?php

use App\Models\Cost;
use App\Models\Project;
use App\Models\User;
use Illuminate\Support\Facades\Storage;

beforeEach(function () {
    $this->user = User::factory()->create();
    $this->project = Project::factory()->create();
});

// ==========================================
// INDEX TESTS
// ==========================================

test('costs index page is displayed', function () {
    Cost::factory()->count(3)->forProject($this->project)->create();

    $response = $this
        ->actingAs($this->user)
        ->get(route('costs.index'));

    $response->assertOk();
    $response->assertViewIs('costs.index');
    $response->assertViewHas('costs');
    $response->assertViewHas('stats');
});

test('guests cannot access costs index', function () {
    $response = $this->get(route('costs.index'));

    $response->assertRedirect(route('login'));
});

// ==========================================
// STORE TESTS
// ==========================================

test('cost can be created with valid data (one-time)', function () {
    $costData = [
        'amount' => 150.50,
        'currency' => 'EUR',
        'type' => 'hosting',
        'recurring' => false,
        'paid_at' => now()->format('Y-m-d'),
        'notes' => 'Server hosting fee',
    ];

    $response = $this
        ->actingAs($this->user)
        ->post(route('costs.store', $this->project), $costData);

    $response->assertRedirect(route('projects.show', ['project' => $this->project, 'tab' => 'costs']));
    $response->assertSessionHas('success');

    $this->assertDatabaseHas('costs', [
        'project_id' => $this->project->id,
        'amount' => 150.50,
        'currency' => 'EUR',
        'type' => 'hosting',
        'recurring' => false,
    ]);
});

test('cost can be created as recurring', function () {
    $costData = [
        'amount' => 29.99,
        'currency' => 'USD',
        'type' => 'api',
        'recurring' => true,
        'recurring_period' => 'monthly',
        'paid_at' => now()->format('Y-m-d'),
        'notes' => 'API subscription',
    ];

    $response = $this
        ->actingAs($this->user)
        ->post(route('costs.store', $this->project), $costData);

    $response->assertRedirect(route('projects.show', ['project' => $this->project, 'tab' => 'costs']));
    $response->assertSessionHas('success');

    $this->assertDatabaseHas('costs', [
        'project_id' => $this->project->id,
        'amount' => 29.99,
        'currency' => 'USD',
        'type' => 'api',
        'recurring' => true,
        'recurring_period' => 'monthly',
    ]);
});

test('cost cannot be created without required fields', function () {
    $response = $this
        ->actingAs($this->user)
        ->post(route('costs.store', $this->project), []);

    $response->assertSessionHasErrors(['amount', 'currency', 'type', 'paid_at']);
});

test('cost cannot be created with invalid amount', function () {
    $response = $this
        ->actingAs($this->user)
        ->post(route('costs.store', $this->project), [
            'amount' => 0,
            'currency' => 'EUR',
            'type' => 'hosting',
            'paid_at' => now()->format('Y-m-d'),
        ]);

    $response->assertSessionHasErrors('amount');
});

test('cost cannot be created with negative amount', function () {
    $response = $this
        ->actingAs($this->user)
        ->post(route('costs.store', $this->project), [
            'amount' => -100,
            'currency' => 'EUR',
            'type' => 'hosting',
            'paid_at' => now()->format('Y-m-d'),
        ]);

    $response->assertSessionHasErrors('amount');
});

test('cost cannot be created with invalid currency', function () {
    $response = $this
        ->actingAs($this->user)
        ->post(route('costs.store', $this->project), [
            'amount' => 100,
            'currency' => 'INVALID',
            'type' => 'hosting',
            'paid_at' => now()->format('Y-m-d'),
        ]);

    $response->assertSessionHasErrors('currency');
});

test('cost cannot be created with invalid type', function () {
    $response = $this
        ->actingAs($this->user)
        ->post(route('costs.store', $this->project), [
            'amount' => 100,
            'currency' => 'EUR',
            'type' => 'invalid_type',
            'paid_at' => now()->format('Y-m-d'),
        ]);

    $response->assertSessionHasErrors('type');
});

test('recurring cost requires recurring_period', function () {
    $response = $this
        ->actingAs($this->user)
        ->post(route('costs.store', $this->project), [
            'amount' => 100,
            'currency' => 'EUR',
            'type' => 'hosting',
            'recurring' => '1', // Form sends string '1' for checkbox
            'paid_at' => now()->format('Y-m-d'),
            // recurring_period is missing
        ]);

    $response->assertSessionHasErrors('recurring_period');
});

test('cost cannot be created with invalid recurring_period', function () {
    $response = $this
        ->actingAs($this->user)
        ->post(route('costs.store', $this->project), [
            'amount' => 100,
            'currency' => 'EUR',
            'type' => 'hosting',
            'recurring' => true,
            'recurring_period' => 'weekly', // invalid
            'paid_at' => now()->format('Y-m-d'),
        ]);

    $response->assertSessionHasErrors('recurring_period');
});

test('guests cannot create costs', function () {
    $response = $this->post(route('costs.store', $this->project), [
        'amount' => 100,
        'currency' => 'EUR',
        'type' => 'hosting',
        'paid_at' => now()->format('Y-m-d'),
    ]);

    $response->assertRedirect(route('login'));
});

// ==========================================
// UPDATE TESTS
// ==========================================

test('cost can be updated', function () {
    $cost = Cost::factory()->forProject($this->project)->create([
        'amount' => 100,
        'currency' => 'EUR',
        'type' => 'hosting',
    ]);

    $response = $this
        ->actingAs($this->user)
        ->put(route('costs.update', [$this->project, $cost]), [
            'amount' => 200,
            'currency' => 'USD',
            'type' => 'api',
            'recurring' => false,
            'paid_at' => now()->format('Y-m-d'),
        ]);

    $response->assertRedirect(route('projects.show', ['project' => $this->project, 'tab' => 'costs']));
    $response->assertSessionHas('success');

    $cost->refresh();
    expect($cost->amount)->toBe('200.00');
    expect($cost->currency)->toBe('USD');
    expect($cost->type)->toBe('api');
});

test('cost can be changed from one-time to recurring', function () {
    $cost = Cost::factory()->oneTime()->forProject($this->project)->create();

    $response = $this
        ->actingAs($this->user)
        ->put(route('costs.update', [$this->project, $cost]), [
            'amount' => $cost->amount,
            'currency' => $cost->currency,
            'type' => $cost->type,
            'recurring' => true,
            'recurring_period' => 'yearly',
            'paid_at' => now()->format('Y-m-d'),
        ]);

    $response->assertRedirect(route('projects.show', ['project' => $this->project, 'tab' => 'costs']));

    $cost->refresh();
    expect($cost->recurring)->toBeTrue();
    expect($cost->recurring_period)->toBe('yearly');
});

test('cost cannot be updated with invalid data', function () {
    $cost = Cost::factory()->forProject($this->project)->create();

    $response = $this
        ->actingAs($this->user)
        ->put(route('costs.update', [$this->project, $cost]), [
            'amount' => -100,
            'currency' => 'INVALID',
            'type' => 'invalid',
            'paid_at' => now()->format('Y-m-d'),
        ]);

    $response->assertSessionHasErrors(['amount', 'currency', 'type']);
});

test('guests cannot update costs', function () {
    $cost = Cost::factory()->forProject($this->project)->create();

    $response = $this->put(route('costs.update', [$this->project, $cost]), [
        'amount' => 100,
        'currency' => 'EUR',
        'type' => 'hosting',
        'paid_at' => now()->format('Y-m-d'),
    ]);

    $response->assertRedirect(route('login'));
});

// ==========================================
// DELETE TESTS
// ==========================================

test('cost can be deleted', function () {
    $cost = Cost::factory()->forProject($this->project)->create();
    $costId = $cost->id;

    $response = $this
        ->actingAs($this->user)
        ->delete(route('costs.destroy', [$this->project, $cost]));

    $response->assertRedirect(route('projects.show', ['project' => $this->project, 'tab' => 'costs']));
    $response->assertSessionHas('success');

    $this->assertDatabaseMissing('costs', ['id' => $costId]);
});

test('guests cannot delete costs', function () {
    $cost = Cost::factory()->forProject($this->project)->create();

    $response = $this->delete(route('costs.destroy', [$this->project, $cost]));

    $response->assertRedirect(route('login'));
});

test('deleting cost also deletes associated receipt file', function () {
    Storage::fake('local');

    // Create a fake receipt file
    $receiptPath = 'receipts/test-receipt.pdf';
    Storage::put($receiptPath, 'fake content');

    $cost = Cost::factory()->forProject($this->project)->create([
        'receipt_path' => $receiptPath,
    ]);

    Storage::assertExists($receiptPath);

    $response = $this
        ->actingAs($this->user)
        ->delete(route('costs.destroy', [$this->project, $cost]));

    $response->assertRedirect(route('projects.show', ['project' => $this->project, 'tab' => 'costs']));

    $this->assertDatabaseMissing('costs', ['id' => $cost->id]);
    Storage::assertMissing($receiptPath);
});

// ==========================================
// EDGE CASES
// ==========================================

test('cost with all currencies can be created', function () {
    $currencies = ['EUR', 'USD', 'GBP', 'CHF', 'JPY'];

    foreach ($currencies as $currency) {
        $response = $this
            ->actingAs($this->user)
            ->post(route('costs.store', $this->project), [
                'amount' => 100,
                'currency' => $currency,
                'type' => 'hosting',
                'paid_at' => now()->format('Y-m-d'),
            ]);

        $response->assertSessionHasNoErrors();
    }

    expect(Cost::where('project_id', $this->project->id)->count())->toBe(5);
});

test('cost with all types can be created', function () {
    $types = ['hosting', 'api', 'tool', 'license', 'ads'];

    foreach ($types as $type) {
        $response = $this
            ->actingAs($this->user)
            ->post(route('costs.store', $this->project), [
                'amount' => 100,
                'currency' => 'EUR',
                'type' => $type,
                'paid_at' => now()->format('Y-m-d'),
            ]);

        $response->assertSessionHasNoErrors();
    }

    expect(Cost::where('project_id', $this->project->id)->count())->toBe(5);
});

test('cost with all recurring periods can be created', function () {
    $periods = ['monthly', 'yearly', 'quarterly'];

    foreach ($periods as $period) {
        $response = $this
            ->actingAs($this->user)
            ->post(route('costs.store', $this->project), [
                'amount' => 100,
                'currency' => 'EUR',
                'type' => 'hosting',
                'recurring' => true,
                'recurring_period' => $period,
                'paid_at' => now()->format('Y-m-d'),
            ]);

        $response->assertSessionHasNoErrors();
    }

    expect(Cost::where('project_id', $this->project->id)->count())->toBe(3);
});

test('cost amount respects max limit', function () {
    $response = $this
        ->actingAs($this->user)
        ->post(route('costs.store', $this->project), [
            'amount' => 1000000,
            'currency' => 'EUR',
            'type' => 'hosting',
            'paid_at' => now()->format('Y-m-d'),
        ]);

    $response->assertSessionHasErrors('amount');
});
