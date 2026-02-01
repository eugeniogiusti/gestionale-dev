<?php

namespace Database\Factories;

use App\Models\Payment;
use App\Models\Project;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Payment>
 */
class PaymentFactory extends Factory
{
    protected $model = Payment::class;

    public function definition(): array
    {
        $isPaid = fake()->boolean(70);

        return [
            'project_id' => Project::factory(),
            'amount' => fake()->randomFloat(2, 100, 10000),
            'currency' => fake()->randomElement(['EUR', 'USD', 'GBP', 'CHF', 'JPY']),
            'paid_at' => $isPaid ? fake()->dateTimeBetween('-3 months', 'now') : null,
            'due_date' => $isPaid ? null : fake()->dateTimeBetween('now', '+3 months'),
            'method' => $isPaid ? fake()->randomElement(['cash', 'bank', 'stripe', 'paypal']) : null,
            'reference' => fake()->optional()->bothify('INV-####-????'),
            'notes' => fake()->optional()->sentence(),
            'invoice_path' => null,
        ];
    }

    public function paid(): static
    {
        return $this->state(fn (array $attributes) => [
            'paid_at' => fake()->dateTimeBetween('-3 months', 'now'),
            'due_date' => null,
            'method' => fake()->randomElement(['cash', 'bank', 'stripe', 'paypal']),
        ]);
    }

    public function pending(): static
    {
        return $this->state(fn (array $attributes) => [
            'paid_at' => null,
            'due_date' => fake()->dateTimeBetween('now', '+3 months'),
            'method' => null,
        ]);
    }

    public function overdue(): static
    {
        return $this->state(fn (array $attributes) => [
            'paid_at' => null,
            'due_date' => fake()->dateTimeBetween('-2 months', '-1 day'),
            'method' => null,
        ]);
    }

    public function withMethod(string $method): static
    {
        return $this->state(fn (array $attributes) => [
            'method' => $method,
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
}
