<?php

namespace App\Queries;

use App\Models\Document;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

class DocumentIndexQuery
{
    public function handle(): LengthAwarePaginator
    {
        $query = Document::with(['project', 'labels'])
            ->recent();

        // Filter by project
        if ($projectId = request('project_id')) {
            $query->forProject($projectId);
        }

        // Filter by labels (multiple)
        if ($labelIds = request('label_ids')) {
            $labelIds = is_array($labelIds) ? $labelIds : [$labelIds];
            
            $query->whereHas('labels', function($q) use ($labelIds) {
                $q->whereIn('labels.id', $labelIds);
            });
        }

        // Search by name
        if ($search = request('search')) {
            $query->search($search);
        }

        return $query->paginate(20);
    }
}