<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\Cost;
use App\Http\Requests\StoreCostRequest;
use App\Http\Requests\UpdateCostRequest;
use App\Queries\CostIndexQuery;
use App\Queries\CostStatsQuery;

class CostController extends Controller
{
    /**
     * Display a listing of costs (global index with filters)
     */
    public function index(CostIndexQuery $indexQuery, CostStatsQuery $statsQuery)
    {
        $costs = $indexQuery->handle();
        $stats = $statsQuery->handle();
        
        return view('costs.index', compact('costs', 'stats'));
    }

    /**
     * Store a new cost (from project show page)
     */
    public function store(StoreCostRequest $request, Project $project)
    {
        $project->costs()->create($request->validated());

        return redirect()
            ->route('projects.show', ['project' => $project, 'tab' => 'costs'])
            ->with('success', __('costs.created_successfully'));
    }

    /**
     * Update cost (from project show page)
     */
    public function update(UpdateCostRequest $request, Project $project, Cost $cost)
    {
        $cost->update($request->validated());

        return redirect()
            ->route('projects.show', ['project' => $project, 'tab' => 'costs'])
            ->with('success', __('costs.updated_successfully'));
    }

    /**
     * Delete cost (from project show page)
     */
    public function destroy(Project $project, Cost $cost)
    {
        $cost->delete();

        return redirect()
            ->route('projects.show', ['project' => $project, 'tab' => 'costs'])
            ->with('success', __('costs.deleted_successfully'));
    }
}