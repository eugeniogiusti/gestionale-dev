<?php

namespace App\Queries;

use App\Models\Project;
use Illuminate\Support\Facades\DB;

class ProjectStatsQuery
{
    /**
     * Get all project statistics
     */
    public function handle(): array
    {
        // Total projects
        $total = Project::count();

        // Projects by status
        $byStatus = Project::select('status', DB::raw('count(*) as count'))
            ->groupBy('status')
            ->pluck('count', 'status')
            ->toArray();

        // New projects this month
        $newThisMonth = Project::whereYear('created_at', now()->year)
            ->whereMonth('created_at', now()->month)
            ->count();

        // Completed this week
        $completedThisWeek = Project::where('status', 'completed')
            ->whereBetween('updated_at', [
                now()->startOfWeek(),
                now()->endOfWeek()
            ])
            ->count();

        return [
            'total' => $total,
            'draft' => $byStatus['draft'] ?? 0,
            'in_progress' => $byStatus['in_progress'] ?? 0,
            'completed' => $byStatus['completed'] ?? 0,
            'archived' => $byStatus['archived'] ?? 0,
            'new_this_month' => $newThisMonth,
            'completed_this_week' => $completedThisWeek,
            'in_progress_percentage' => $total > 0 ? round(($byStatus['in_progress'] ?? 0) / $total * 100) : 0,
            'archived_percentage' => $total > 0 ? round(($byStatus['archived'] ?? 0) / $total * 100) : 0,
        ];
    }
}