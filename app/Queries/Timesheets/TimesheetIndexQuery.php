<?php

namespace App\Queries\Timesheets;

use App\Models\Timesheet;

/**
 * Paginated query for the timesheets index page.
 *
 * Filters: search (project name), year, month.
 * Eager loads: project.client.
 * Sorting: year desc, month desc. Pagination: 20 per page.
 */
class TimesheetIndexQuery
{
    public function handle()
    {
        return Timesheet::query()
            ->with(['project.client'])
            ->when(request('search'), function ($q, $search) {
                $q->whereHas('project', fn ($q) => $q->where('name', 'like', "%{$search}%"));
            })
            ->when(request('year'), fn ($q, $year) => $q->where('year', $year))
            ->when(request('month'), fn ($q, $month) => $q->where('month', $month))
            ->orderBy('year', 'desc')
            ->orderBy('month', 'desc')
            ->paginate(20)
            ->withQueryString();
    }

    public function availableYears(): array
    {
        return Timesheet::query()
            ->distinct()
            ->orderBy('year', 'desc')
            ->pluck('year')
            ->toArray();
    }
}
