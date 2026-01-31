<?php

namespace Database\Factories;

use App\Models\Meeting;
use App\Models\Project;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Meeting>
 */
class MeetingFactory extends Factory
{
    protected $model = Meeting::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'project_id' => Project::factory(),
            'title' => fake()->sentence(3),
            'description' => fake()->optional()->paragraph(),
            'scheduled_at' => fake()->dateTimeBetween('+1 day', '+1 month'),
            'duration_minutes' => fake()->randomElement([30, 45, 60, 90, 120]),
            'location' => fake()->optional()->address(),
            'meeting_url' => fake()->optional()->url(),
            'status' => fake()->randomElement(Meeting::STATUSES),
            'notes' => fake()->optional()->paragraph(),
        ];
    }

    /**
     * Meeting for a specific project
     */
    public function forProject(Project $project): static
    {
        return $this->state(fn (array $attributes) => [
            'project_id' => $project->id,
        ]);
    }

    /**
     * Scheduled status (upcoming)
     */
    public function scheduled(): static
    {
        return $this->state(fn (array $attributes) => [
            'status' => 'scheduled',
            'scheduled_at' => fake()->dateTimeBetween('+1 day', '+1 month'),
        ]);
    }

    /**
     * Completed status
     */
    public function completed(): static
    {
        return $this->state(fn (array $attributes) => [
            'status' => 'completed',
            'scheduled_at' => fake()->dateTimeBetween('-1 month', '-1 day'),
        ]);
    }

    /**
     * Cancelled status
     */
    public function cancelled(): static
    {
        return $this->state(fn (array $attributes) => [
            'status' => 'cancelled',
        ]);
    }

    /**
     * Upcoming meeting (scheduled in the future)
     */
    public function upcoming(): static
    {
        return $this->state(fn (array $attributes) => [
            'status' => 'scheduled',
            'scheduled_at' => fake()->dateTimeBetween('+1 hour', '+2 weeks'),
        ]);
    }

    /**
     * Past meeting
     */
    public function past(): static
    {
        return $this->state(fn (array $attributes) => [
            'scheduled_at' => fake()->dateTimeBetween('-1 month', '-1 day'),
        ]);
    }

    /**
     * Meeting scheduled for today
     */
    public function today(): static
    {
        return $this->state(fn (array $attributes) => [
            'status' => 'scheduled',
            'scheduled_at' => now()->setHour(14)->setMinute(0),
        ]);
    }

    /**
     * Meeting scheduled for this week
     */
    public function thisWeek(): static
    {
        return $this->state(fn (array $attributes) => [
            'status' => 'scheduled',
            'scheduled_at' => now()->addDays(rand(1, 6)),
        ]);
    }

    /**
     * Meeting with video call URL
     */
    public function withVideoCall(): static
    {
        return $this->state(fn (array $attributes) => [
            'meeting_url' => 'https://meet.google.com/' . fake()->regexify('[a-z]{3}-[a-z]{4}-[a-z]{3}'),
            'location' => null,
        ]);
    }

    /**
     * In-person meeting with location
     */
    public function inPerson(): static
    {
        return $this->state(fn (array $attributes) => [
            'location' => fake()->address(),
            'meeting_url' => null,
        ]);
    }

    /**
     * Minimal required fields only
     */
    public function minimal(): static
    {
        return $this->state(fn (array $attributes) => [
            'title' => fake()->sentence(2),
            'description' => null,
            'scheduled_at' => now()->addDay(),
            'duration_minutes' => 60,
            'location' => null,
            'meeting_url' => null,
            'status' => 'scheduled',
            'notes' => null,
        ]);
    }
}
