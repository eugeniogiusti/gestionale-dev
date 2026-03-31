<?php

namespace App\Queries\Costs;

use App\Models\Cost;

/**
 * Paginated query for the costs index page.
 *
 * Filters: project_id, type, currency, recurring, date_from/date_to, search (notes/project name).
 * Eager loads: project.client.
 * Sorting: paid_at desc. Pagination: 15 per page.
 */
class CostIndexQuery
{
    public function handle()
    {
        return Cost::query()
            ->with(['project.client'])
            ->when(request('project_id'), fn($q, $projectId) => $q->forProject($projectId))
            ->when(request('type'), fn($q, $type) => $q->type($type))
            ->when(request('currency'), fn($q, $currency) => $q->currency($currency))
            ->when(request('date_from'), fn($q, $date) => $q->where('paid_at', '>=', $date))
            ->when(request('date_to'), fn($q, $date) => $q->where('paid_at', '<=', $date))
            ->when(request('search'), function($q, $search) {
                $q->where(function($query) use ($search) {
                    $query->where('notes', 'like', "%{$search}%")
                          ->orWhereHas('project', fn($q) => $q->where('name', 'like', "%{$search}%"));
                });
            })
            ->orderBy('paid_at', 'desc')
            ->paginate(15);
    }
}