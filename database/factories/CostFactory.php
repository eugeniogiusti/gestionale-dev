<?php

namespace Database\Factories;

use App\Models\Cost;
use App\Models\Project;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Cost>
 */
class CostFactory extends Factory
{
    protected $model = Cost::class;

    public function definition(): array
    {
        $isRecurring = fake()->boolean(30);

        return [
            'project_id' => Project::factory(),
            'amount' => fake()->randomFloat(2, 10, 5000),
            'currency' => fake()->randomElement(['EUR', 'USD', 'GBP', 'CHF', 'JPY']),
            'type' => fake()->randomElement(['hosting', 'api', 'tool', 'license', 'ads']),
            'recurring' => $isRecurring,
            'recurring_period' => $isRecurring ? fake()->randomElement(['monthly', 'yearly', 'quarterly']) : null,
            'paid_at' => fake()->dateTimeBetween('-6 months', 'now'),
            'receipt_path' => null,
            'notes' => fake()->optional()->sentence(),
        ];
    }

    public function recurring(string $period = 'monthly'): static
    {
        return $this->state(fn (array $attributes) => [
            'recurring' => true,
            'recurring_period' => $period,
        ]);
    }

    public function oneTime(): static
    {
        return $this->state(fn (array $attributes) => [
            'recurring' => false,
            'recurring_period' => null,
        ]);
    }

    public function withType(string $type): static
    {
        return $this->state(fn (array $attributes) => [
            'type' => $type,
        ]);
    }

    public function withCurrency(string $currency): static
    {
        return $this->state(fn (array $attributes) => [
            'currency' => $currency,
        ]);
    }

    public function forProject(Project $project): static
    {
        return $this->state(fn (array $attributes) => [
            'project_id' => $project->id,
        ]);
    }

    public function paidThisMonth(): static
    {
        return $this->state(fn (array $attributes) => [
            'paid_at' => fake()->dateTimeBetween(now()->startOfMonth(), now()),
        ]);
    }

    public function paidThisYear(): static
    {
        return $this->state(fn (array $attributes) => [
            'paid_at' => fake()->dateTimeBetween(now()->startOfYear(), now()),
        ]);
    }

    public function withReceipt(): static
    {
        return $this->state(fn (array $attributes) => [
            'receipt_path' => 'receipts/' . fake()->uuid() . '.pdf',
        ]);
    }
}
