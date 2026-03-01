<?php

namespace App\Http\Controllers\Timesheets;

use App\Http\Controllers\Controller;
use App\Http\Requests\Timesheets\StoreTimesheetRequest;
use App\Models\Project;
use App\Models\Timesheet;
use App\Queries\Timesheets\TimesheetIndexQuery;
use App\Queries\Timesheets\TimesheetStatsQuery;

class TimesheetController extends Controller
{
    /**
     * Global timesheets index with filters and stats.
     */
    public function index(TimesheetIndexQuery $indexQuery, TimesheetStatsQuery $statsQuery)
    {
        $timesheets     = $indexQuery->handle();
        $stats          = $statsQuery->handle();
        $availableYears = $indexQuery->availableYears();

        return view('timesheets.index', compact('timesheets', 'stats', 'availableYears'));
    }

    /**
     * Crea o aggiorna il timesheet mensile di un progetto.
     */
    public function store(StoreTimesheetRequest $request, Project $project)
    {
        $project->timesheets()->updateOrCreate(
            [
                'year'  => $request->year,
                'month' => $request->month,
            ],
            [
                'daily_hours'  => $request->daily_hours ?? [],
                'hourly_rate'  => $project->hourly_rate,
                'notes'        => $request->notes,
            ]
        );

        return redirect()->route('projects.show', [
            'project'   => $project,
            'tab'       => 'timesheets',
            'ts_month'  => $request->month,
            'ts_year'   => $request->year,
        ])->with('success', __('timesheets.saved_successfully'));
    }

    /**
     * Elimina un timesheet mensile.
     */
    public function destroy(Project $project, Timesheet $timesheet)
    {
        $timesheet->delete();

        return redirect()->route('projects.show', [
            'project' => $project,
            'tab'     => 'timesheets',
        ])->with('success', __('timesheets.deleted_successfully'));
    }
}
