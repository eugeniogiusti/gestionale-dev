<?php

namespace App\Services;

use App\Models\Label;

class LabelService
{
    /**
     * Create new label
     */
    public function create(array $data): Label
    {
        return Label::create([
            'name' => $data['name'],
            'color' => $data['color'],
        ]);
    }

    /**
     * Update label
     */
    public function update(Label $label, array $data): Label
    {
        $label->update([
            'name' => $data['name'],
            'color' => $data['color'],
        ]);

        return $label->fresh();
    }

    /**
     * Delete label
     */
    public function delete(Label $label): void
    {
        // Detach from all documents
        $label->documents()->detach();

        // Delete label
        $label->delete();
    }

    /**
     * Get all labels ordered by name
     */
    public function getAll()
    {
        return Label::ordered()->get();
    }
}