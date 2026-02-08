<?php

namespace App\Services\Labels;

use App\Models\Label;

/**
 * CRUD operations for document labels (tags).
 *
 * Labels are color-coded tags that can be attached to documents
 * via a many-to-many relationship. When a label is deleted, it is
 * automatically detached from all associated documents first.
 */
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