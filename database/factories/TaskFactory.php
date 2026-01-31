<?php

namespace Database\Factories;

use App\Models\Project;
use App\Models\Task;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Task>
 */
class TaskFactory extends Factory
{
    protected $model = Task::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'project_id' => Project::factory(),
            'title' => fake()->sentence(4),
            'description' => fake()->optional()->paragraph(),
            'type' => fake()->randomElement(Task::TYPES),
            'status' => fake()->randomElement(Task::STATUSES),
            'priority' => fake()->optional()->randomElement(Task::PRIORITIES),
            'due_date' => fake()->optional()->dateTimeBetween('now', '+2 months'),
            'order' => fake()->numberBetween(0, 100),
        ];
    }

    /**
     * Task for a specific project
     */
    public function forProject(Project $project): static
    {
        return $this->state(fn (array $attributes) => [
            'project_id' => $project->id,
        ]);
    }

    /**
     * Todo status
     */
    public function todo(): static
    {
        return $this->state(fn (array $attributes) => [
            'status' => 'todo',
        ]);
    }

    /**
     * In progress status
     */
    public function inProgress(): static
    {
        return $this->state(fn (array $attributes) => [
            'status' => 'in_progress',
        ]);
    }

    /**
     * Blocked status
     */
    public function blocked(): static
    {
        return $this->state(fn (array $attributes) => [
            'status' => 'blocked',
        ]);
    }

    /**
     * Done status
     */
    public function done(): static
    {
        return $this->state(fn (array $attributes) => [
            'status' => 'done',
        ]);
    }

    /**
     * Feature type
     */
    public function feature(): static
    {
        return $this->state(fn (array $attributes) => [
            'type' => 'feature',
        ]);
    }

    /**
     * Bug type
     */
    public function bug(): static
    {
        return $this->state(fn (array $attributes) => [
            'type' => 'bug',
        ]);
    }

    /**
     * High priority
     */
    public function highPriority(): static
    {
        return $this->state(fn (array $attributes) => [
            'priority' => 'high',
        ]);
    }

    /**
     * Low priority
     */
    public function lowPriority(): static
    {
        return $this->state(fn (array $attributes) => [
            'priority' => 'low',
        ]);
    }

    /**
     * Overdue task
     */
    public function overdue(): static
    {
        return $this->state(fn (array $attributes) => [
            'due_date' => now()->subDays(5),
            'status' => 'todo',
        ]);
    }

    /**
     * Minimal required fields only
     */
    public function minimal(): static
    {
        return $this->state(fn (array $attributes) => [
            'title' => fake()->sentence(3),
            'description' => null,
            'type' => 'feature',
            'status' => 'todo',
            'priority' => null,
            'due_date' => null,
            'order' => 0,
        ]);
    }
}
