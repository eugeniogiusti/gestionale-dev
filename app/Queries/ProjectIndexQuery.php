<?php

namespace App\Queries;

use App\Models\Project;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

class ProjectIndexQuery
{
    /**
     * Handle the query
     */
    public function handle(): LengthAwarePaginator
    {
        return Project::with('client')
            ->when(request('status'), function ($query) {
                $query->where('status', request('status'));
            })
            ->when(request('priority'), function ($query) {
                $query->where('priority', request('priority'));
            })
            ->when(request('search'), function ($query) {
                $search = request('search');
                $query->where(function($q) use ($search) {
                    $q->where('name', 'like', "%{$search}%")
                      ->orWhereHas('client', function($clientQuery) use ($search) {
                          $clientQuery->where('name', 'like', "%{$search}%")
                                      ->orWhere('vat_number', 'like', "%{$search}%");
                      });
                });
            })
            ->orderBy(
                request('sort_by', 'created_at'),
                request('sort_direction', 'desc')
            )
            ->paginate(15)
            ->appends(request()->query());
    }
}