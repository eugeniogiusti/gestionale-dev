<?php

use App\Models\Cost;
use App\Models\Project;
use App\Queries\Costs\CostIndexQuery;

test('index query returns paginated results', function () {
    Cost::factory()->count(20)->create();

    $result = (new CostIndexQuery())->handle();

    expect($result)->toBeInstanceOf(\Illuminate\Pagination\LengthAwarePaginator::class);
    expect($result->count())->toBe(15); // Default pagination
    expect($result->total())->toBe(20);
});

test('index query filters by project_id', function () {
    $project = Project::factory()->create();
    Cost::factory()->forProject($project)->count(3)->create();
    Cost::factory()->count(2)->create();

    request()->merge(['project_id' => $project->id]);

    $result = (new CostIndexQuery())->handle();

    expect($result->total())->toBe(3);
});

test('index query filters by type', function () {
    Cost::factory()->withType('hosting')->count(3)->create();
    Cost::factory()->withType('api')->count(2)->create();

    request()->merge(['type' => 'hosting']);

    $result = (new CostIndexQuery())->handle();

    expect($result->total())->toBe(3);
    expect($result->every(fn ($c) => $c->type === 'hosting'))->toBeTrue();
});

test('index query filters by currency', function () {
    Cost::factory()->withCurrency('EUR')->count(3)->create();
    Cost::factory()->withCurrency('USD')->count(2)->create();

    request()->merge(['currency' => 'EUR']);

    $result = (new CostIndexQuery())->handle();

    expect($result->total())->toBe(3);
    expect($result->every(fn ($c) => $c->currency === 'EUR'))->toBeTrue();
});

test('index query filters by recurring true', function () {
    Cost::factory()->recurring()->count(3)->create();
    Cost::factory()->oneTime()->count(2)->create();

    request()->merge(['recurring' => '1']);

    $result = (new CostIndexQuery())->handle();

    expect($result->total())->toBe(3);
    expect($result->every(fn ($c) => $c->recurring === true))->toBeTrue();
});

test('index query filters by recurring false', function () {
    Cost::factory()->recurring()->count(3)->create();
    Cost::factory()->oneTime()->count(2)->create();

    request()->merge(['recurring' => '0']);

    $result = (new CostIndexQuery())->handle();

    expect($result->total())->toBe(2);
    expect($result->every(fn ($c) => $c->recurring === false))->toBeTrue();
});

test('index query filters by date_from', function () {
    Cost::factory()->create(['paid_at' => now()->subDays(5)]);
    Cost::factory()->create(['paid_at' => now()->subDays(10)]);
    Cost::factory()->create(['paid_at' => now()->subDays(2)]);

    request()->merge(['date_from' => now()->subDays(6)->format('Y-m-d')]);

    $result = (new CostIndexQuery())->handle();

    expect($result->total())->toBe(2);
});

test('index query filters by date_to', function () {
    Cost::factory()->create(['paid_at' => now()->subDays(5)]);
    Cost::factory()->create(['paid_at' => now()->subDays(10)]);
    Cost::factory()->create(['paid_at' => now()->subDays(2)]);

    request()->merge(['date_to' => now()->subDays(4)->format('Y-m-d')]);

    $result = (new CostIndexQuery())->handle();

    expect($result->total())->toBe(2);
});

test('index query filters by date range', function () {
    Cost::factory()->create(['paid_at' => now()->subDays(5)]);
    Cost::factory()->create(['paid_at' => now()->subDays(10)]);
    Cost::factory()->create(['paid_at' => now()->subDays(15)]);
    Cost::factory()->create(['paid_at' => now()->subDays(2)]);

    request()->merge([
        'date_from' => now()->subDays(12)->format('Y-m-d'),
        'date_to' => now()->subDays(4)->format('Y-m-d'),
    ]);

    $result = (new CostIndexQuery())->handle();

    expect($result->total())->toBe(2);
});

test('index query searches by notes', function () {
    Cost::factory()->create(['notes' => 'Monthly server hosting fee']);
    Cost::factory()->create(['notes' => 'API subscription']);
    Cost::factory()->create(['notes' => 'Software license']);

    request()->merge(['search' => 'server']);

    $result = (new CostIndexQuery())->handle();

    expect($result->total())->toBe(1);
    expect($result->first()->notes)->toBe('Monthly server hosting fee');
});

test('index query searches by project name', function () {
    $project1 = Project::factory()->create(['name' => 'E-commerce Website']);
    $project2 = Project::factory()->create(['name' => 'Mobile App']);

    Cost::factory()->forProject($project1)->create();
    Cost::factory()->forProject($project1)->create();
    Cost::factory()->forProject($project2)->create();

    request()->merge(['search' => 'E-commerce']);

    $result = (new CostIndexQuery())->handle();

    expect($result->total())->toBe(2);
    expect($result->every(fn($c) => $c->project->name === 'E-commerce Website'))->toBeTrue();
});

test('index query eager loads project and client relationships', function () {
    Cost::factory()->count(3)->create();

    $result = (new CostIndexQuery())->handle();

    expect($result->first()->relationLoaded('project'))->toBeTrue();
    expect($result->first()->project->relationLoaded('client'))->toBeTrue();
});

test('index query orders by paid_at desc', function () {
    $cost1 = Cost::factory()->create(['paid_at' => now()->subDays(5)]);
    $cost2 = Cost::factory()->create(['paid_at' => now()->subDays(2)]);
    $cost3 = Cost::factory()->create(['paid_at' => now()->subDays(10)]);

    $result = (new CostIndexQuery())->handle();

    // Most recent paid first
    expect($result->items()[0]->id)->toBe($cost2->id);
    expect($result->items()[1]->id)->toBe($cost1->id);
    expect($result->items()[2]->id)->toBe($cost3->id);
});

test('index query combines multiple filters', function () {
    $project = Project::factory()->create();

    // Matches all filters
    Cost::factory()->forProject($project)->create([
        'type' => 'hosting',
        'currency' => 'EUR',
        'recurring' => true,
        'notes' => 'Important hosting cost',
        'paid_at' => now()->subDays(5),
    ]);

    // Wrong project
    Cost::factory()->create([
        'type' => 'hosting',
        'currency' => 'EUR',
        'recurring' => true,
        'paid_at' => now()->subDays(5),
    ]);

    // Wrong type
    Cost::factory()->forProject($project)->create([
        'type' => 'api',
        'currency' => 'EUR',
        'recurring' => true,
        'paid_at' => now()->subDays(5),
    ]);

    // Wrong currency
    Cost::factory()->forProject($project)->create([
        'type' => 'hosting',
        'currency' => 'USD',
        'recurring' => true,
        'paid_at' => now()->subDays(5),
    ]);

    // Not recurring
    Cost::factory()->forProject($project)->create([
        'type' => 'hosting',
        'currency' => 'EUR',
        'recurring' => false,
        'paid_at' => now()->subDays(5),
    ]);

    request()->merge([
        'project_id' => $project->id,
        'type' => 'hosting',
        'currency' => 'EUR',
        'recurring' => '1',
        'date_from' => now()->subDays(10)->format('Y-m-d'),
        'date_to' => now()->format('Y-m-d'),
    ]);

    $result = (new CostIndexQuery())->handle();

    expect($result->total())->toBe(1);
    expect($result->first()->notes)->toBe('Important hosting cost');
});
