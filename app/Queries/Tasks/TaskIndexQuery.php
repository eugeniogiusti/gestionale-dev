<?php

namespace App\Queries\Tasks;

use App\Models\Task;
use Illuminate\Pagination\LengthAwarePaginator;

class TaskIndexQuery
{
    public function handle(): LengthAwarePaginator
    {
        return Task::query()
            ->with('project')
            ->when(request('project_id'), function ($query, $projectId) {
                $query->where('project_id', $projectId);
            })
            ->when(request('status'), function ($query, $status) {
                $query->status($status);
            })
            ->when(request('type'), function ($query, $type) {
                $query->type($type);
            })
            ->when(request('priority'), function ($query, $priority) {
                $query->priority($priority);
            })
            ->when(request('search'), function ($query, $search) {
                $query->where(function ($q) use ($search) {
                    $q->where('title', 'LIKE', "%{$search}%")
                      ->orWhere('description', 'LIKE', "%{$search}%");
                });
            })
            ->orderBy('order')
            ->orderBy('created_at', 'desc')
            ->paginate(20);
    }
}