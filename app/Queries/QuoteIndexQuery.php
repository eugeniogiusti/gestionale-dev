<?php

namespace App\Queries;

use App\Models\Quote;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

class QuoteIndexQuery  // ✅ DEVE ESSERE QuoteIndexQuery, NON QuoteStatsQuery!
{
    public function handle(): LengthAwarePaginator
    {
        $query = Quote::with(['project.client'])
            ->recent();

        // Filter by project
        if ($projectId = request('project_id')) {
            $query->forProject($projectId);
        }

        // Filter by status
        if ($status = request('status')) {
            $query->byStatus($status);
        }

        // Search by title
        if ($search = request('search')) {
            $query->search($search);
        }

        return $query->paginate(20);
    }
}