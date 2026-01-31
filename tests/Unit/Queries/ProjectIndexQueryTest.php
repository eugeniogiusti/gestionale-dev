<?php

use App\Models\Client;
use App\Models\Project;
use App\Queries\Projects\ProjectIndexQuery;

test('index query returns paginated results', function () {
    Project::factory()->count(20)->create();

    $result = (new ProjectIndexQuery())->handle();

    expect($result)->toBeInstanceOf(\Illuminate\Contracts\Pagination\LengthAwarePaginator::class);
    expect($result->perPage())->toBe(15);
    expect($result->total())->toBe(20);
});

test('index query filters by status', function () {
    Project::factory()->inProgress()->count(3)->create();
    Project::factory()->draft()->count(2)->create();

    request()->merge(['status' => 'in_progress']);

    $result = (new ProjectIndexQuery())->handle();

    expect($result->total())->toBe(3);
    expect($result->every(fn ($p) => $p->status === 'in_progress'))->toBeTrue();

    request()->replace([]);
});

test('index query filters by priority', function () {
    Project::factory()->highPriority()->count(2)->create();
    Project::factory()->lowPriority()->count(3)->create();

    request()->merge(['priority' => 'high']);

    $result = (new ProjectIndexQuery())->handle();

    expect($result->total())->toBe(2);
    expect($result->every(fn ($p) => $p->priority === 'high'))->toBeTrue();

    request()->replace([]);
});

test('index query searches by project name', function () {
    Project::factory()->create(['name' => 'Website Redesign']);
    Project::factory()->create(['name' => 'Mobile App']);
    Project::factory()->create(['name' => 'Website Maintenance']);

    request()->merge(['search' => 'Website']);

    $result = (new ProjectIndexQuery())->handle();

    expect($result->total())->toBe(2);

    request()->replace([]);
});

test('index query searches by client name', function () {
    $acmeClient = Client::factory()->create(['name' => 'Acme Corporation']);
    $betaClient = Client::factory()->create(['name' => 'Beta Inc']);

    Project::factory()->forClient($acmeClient)->create();
    Project::factory()->forClient($betaClient)->create();

    request()->merge(['search' => 'Acme']);

    $result = (new ProjectIndexQuery())->handle();

    expect($result->total())->toBe(1);
    expect($result->first()->client->name)->toBe('Acme Corporation');

    request()->replace([]);
});

test('index query searches by client vat number', function () {
    $client = Client::factory()->create(['vat_number' => 'IT12345678901']);
    Project::factory()->forClient($client)->create();
    Project::factory()->create();

    request()->merge(['search' => '12345']);

    $result = (new ProjectIndexQuery())->handle();

    expect($result->total())->toBe(1);

    request()->replace([]);
});

test('index query sorts by created_at desc by default', function () {
    $oldest = Project::factory()->create(['created_at' => now()->subDays(2)]);
    $newest = Project::factory()->create(['created_at' => now()]);
    $middle = Project::factory()->create(['created_at' => now()->subDay()]);

    $result = (new ProjectIndexQuery())->handle();

    expect($result->first()->id)->toBe($newest->id);
    expect($result->last()->id)->toBe($oldest->id);
});

test('index query can sort by custom field', function () {
    Project::factory()->create(['name' => 'Charlie Project']);
    Project::factory()->create(['name' => 'Alpha Project']);
    Project::factory()->create(['name' => 'Beta Project']);

    request()->merge(['sort_by' => 'name', 'sort_direction' => 'asc']);

    $result = (new ProjectIndexQuery())->handle();

    expect($result->first()->name)->toBe('Alpha Project');
    expect($result->last()->name)->toBe('Charlie Project');

    request()->replace([]);
});

test('index query eager loads client relationship', function () {
    Project::factory()->count(3)->create();

    $result = (new ProjectIndexQuery())->handle();

    expect($result->first()->relationLoaded('client'))->toBeTrue();
});

test('index query combines multiple filters', function () {
    $client = Client::factory()->create(['name' => 'Acme Corp']);

    Project::factory()->forClient($client)->inProgress()->highPriority()->create(['name' => 'Acme Active High']);
    Project::factory()->forClient($client)->inProgress()->lowPriority()->create(['name' => 'Acme Active Low']);
    Project::factory()->forClient($client)->draft()->highPriority()->create(['name' => 'Acme Draft High']);

    request()->merge([
        'status' => 'in_progress',
        'priority' => 'high',
        'search' => 'Acme',
    ]);

    $result = (new ProjectIndexQuery())->handle();

    expect($result->total())->toBe(1);
    expect($result->first()->name)->toBe('Acme Active High');

    request()->replace([]);
});
