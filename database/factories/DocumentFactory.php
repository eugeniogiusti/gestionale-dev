<?php

namespace Database\Factories;

use App\Models\Document;
use App\Models\Project;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Document>
 */
class DocumentFactory extends Factory
{
    protected $model = Document::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'project_id' => Project::factory(),
            'name' => fake()->words(3, true),
            'file_path' => 'documents/doc-' . time() . '-' . bin2hex(random_bytes(8)) . '.pdf',
            'uploaded_at' => fake()->dateTimeBetween('-1 month', 'now'),
            'notes' => fake()->optional()->sentence(),
        ];
    }

    /**
     * Create document for a specific project.
     */
    public function forProject(Project $project): static
    {
        return $this->state(fn (array $attributes) => [
            'project_id' => $project->id,
        ]);
    }

    /**
     * Create document with a specific file extension.
     */
    public function withExtension(string $extension): static
    {
        return $this->state(fn (array $attributes) => [
            'file_path' => 'documents/doc-' . time() . '-' . bin2hex(random_bytes(8)) . '.' . $extension,
        ]);
    }

    /**
     * Create document uploaded this month.
     */
    public function thisMonth(): static
    {
        return $this->state(fn (array $attributes) => [
            'uploaded_at' => fake()->dateTimeBetween(now()->startOfMonth(), now()),
        ]);
    }

    /**
     * Create document with notes.
     */
    public function withNotes(string $notes = null): static
    {
        return $this->state(fn (array $attributes) => [
            'notes' => $notes ?? fake()->paragraph(),
        ]);
    }
}
