<?php

namespace App\Queries;

use App\Models\Meeting;

class MeetingIndexQuery
{
    public function handle()
    {
        return Meeting::query()
            ->with(['project.client'])
            ->when(request('status'), fn($q, $status) => $q->status($status))
            ->when(request('project_id'), fn($q, $projectId) => $q->forProject($projectId))
            ->when(request('date_from'), fn($q, $date) => $q->where('scheduled_at', '>=', $date))
            ->when(request('date_to'), fn($q, $date) => $q->where('scheduled_at', '<=', $date))
            ->when(request('search'), function($q, $search) {
                $q->where(function($query) use ($search) {
                    $query->where('title', 'like', "%{$search}%")
                          ->orWhere('description', 'like', "%{$search}%");
                });
            })
            ->orderBy('scheduled_at', 'desc')
            ->paginate(15);
    }
}