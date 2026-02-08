<?php

namespace App\Queries\Documents;

use App\Models\Document;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

/**
 * Paginated query for the documents index page.
 *
 * Filters: label_id, search (document name via scope).
 * Eager loads: project, labels.
 * Sorting: recent (scope). Pagination: 20 per page.
 */
class DocumentIndexQuery
{
    public function handle(): LengthAwarePaginator
    {
        $query = Document::with(['project', 'labels'])
            ->recent();

        // Filter by label
        if ($labelId = request('label_id')) {
            $query->whereHas('labels', fn($q) => $q->where('labels.id', $labelId));
        }

        // Search by name
        if ($search = request('search')) {
            $query->search($search);
        }

        return $query->paginate(20);
    }
}