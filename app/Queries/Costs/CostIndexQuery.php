<?php

namespace App\Queries\Costs;

use App\Models\Cost;

class CostIndexQuery
{
    public function handle()
    {
        return Cost::query()
            ->with(['project.client'])
            ->when(request('project_id'), fn($q, $projectId) => $q->forProject($projectId))
            ->when(request('type'), fn($q, $type) => $q->type($type))
            ->when(request('currency'), fn($q, $currency) => $q->currency($currency))
            ->when(request('recurring') !== null, fn($q) => $q->recurring(request('recurring') === '1'))
            ->when(request('date_from'), fn($q, $date) => $q->where('paid_at', '>=', $date))
            ->when(request('date_to'), fn($q, $date) => $q->where('paid_at', '<=', $date))
            ->when(request('search'), function($q, $search) {
                $q->where(function($query) use ($search) {
                    $query->where('notes', 'like', "%{$search}%");
                });
            })
            ->orderBy('paid_at', 'desc')
            ->paginate(15);
    }
}