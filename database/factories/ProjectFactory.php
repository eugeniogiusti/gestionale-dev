<?php

namespace Database\Factories;

use App\Models\Client;
use App\Models\Project;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Project>
 */
class ProjectFactory extends Factory
{
    protected $model = Project::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $name = fake()->catchPhrase();

        return [
            'client_id' => Client::factory(),
            'name' => $name,
            'slug' => Str::slug($name) . '-' . fake()->unique()->randomNumber(4),
            'description' => fake()->paragraph(),
            'status' => fake()->randomElement(['draft', 'in_progress', 'completed', 'archived']),
            'type' => fake()->randomElement(['client_work', 'product', 'content', 'asset']),
            'priority' => fake()->randomElement(['low', 'medium', 'high']),
            'repo_url' => fake()->optional()->url(),
            'staging_url' => fake()->optional()->url(),
            'production_url' => fake()->optional()->url(),
            'figma_url' => fake()->optional()->url(),
            'docs_url' => fake()->optional()->url(),
            'notes' => fake()->optional()->paragraph(),
            'start_date' => fake()->optional()->dateTimeBetween('-1 month', 'now'),
            'due_date' => fake()->optional()->dateTimeBetween('now', '+3 months'),
        ];
    }

    /**
     * Indicate that the project is a draft.
     */
    public function draft(): static
    {
        return $this->state(fn (array $attributes) => [
            'status' => 'draft',
        ]);
    }

    /**
     * Indicate that the project is in progress.
     */
    public function inProgress(): static
    {
        return $this->state(fn (array $attributes) => [
            'status' => 'in_progress',
        ]);
    }

    /**
     * Indicate that the project is completed.
     */
    public function completed(): static
    {
        return $this->state(fn (array $attributes) => [
            'status' => 'completed',
        ]);
    }

    /**
     * Indicate that the project is archived.
     */
    public function archived(): static
    {
        return $this->state(fn (array $attributes) => [
            'status' => 'archived',
        ]);
    }

    /**
     * Indicate that the project is internal (no client).
     */
    public function internal(): static
    {
        return $this->state(fn (array $attributes) => [
            'client_id' => null,
        ]);
    }

    /**
     * Indicate that the project has high priority.
     */
    public function highPriority(): static
    {
        return $this->state(fn (array $attributes) => [
            'priority' => 'high',
        ]);
    }

    /**
     * Indicate that the project has low priority.
     */
    public function lowPriority(): static
    {
        return $this->state(fn (array $attributes) => [
            'priority' => 'low',
        ]);
    }

    /**
     * Indicate that the project has minimal data.
     */
    public function minimal(): static
    {
        return $this->state(fn (array $attributes) => [
            'client_id' => null,
            'description' => null,
            'priority' => null,
            'repo_url' => null,
            'staging_url' => null,
            'production_url' => null,
            'figma_url' => null,
            'docs_url' => null,
            'notes' => null,
            'start_date' => null,
            'due_date' => null,
        ]);
    }

    /**
     * Create a project for a specific client.
     */
    public function forClient(Client $client): static
    {
        return $this->state(fn (array $attributes) => [
            'client_id' => $client->id,
        ]);
    }
}
