<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Http\Requests\StoreProjectRequest;
use App\Http\Requests\UpdateProjectRequest;
use App\Queries\ProjectIndexQuery;
use App\Queries\ProjectStatsQuery;
use App\Queries\ProjectProfitStatsQuery;


class ProjectController extends Controller
{
        /**
     * Retrieves paginated projects with applied filters and calculates
     * aggregated statistics for index page cards.
     */
    public function index()
    {
        // Retrieve paginated projects with filters applied
        $projects = (new ProjectIndexQuery())->handle();
        
        // Calculate aggregated statistics for index cards
        $stats = (new ProjectStatsQuery())->handle();
        
        return view('projects.index', compact('projects', 'stats'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('projects.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreProjectRequest $request)
    {
        Project::create($request->validated());

        return redirect()->route('projects.index')
            ->with('success', __('projects.created_successfully'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Project $project, ProjectProfitStatsQuery $profitStats)
    {
        $project->load('client');
        $project->load('tasks');
        $project->load('meetings');
        $project->load('payments');
        $project->load('costs');
        $project->load('documents.labels'); 
        
        
        $profitData = $profitStats->handle($project);
    
        return view('projects.show', compact('project', 'profitData'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Project $project)
    {
        return view('projects.edit', compact('project'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProjectRequest $request, Project $project)
    {
        $project->update($request->validated());

        // if the request arrives from show, return to show
        if ($request->input('back') === 'show') {
            return redirect()->route('projects.show', $project)
                ->with('success', __('projects.updated_successfully'));
        }

        // Otherwise, return to index
        return redirect()->route('projects.index')
            ->with('success', __('projects.updated_successfully'));
    }

    /**
     * Remove the specified resource from storage (soft delete).
     */
    public function destroy(Project $project)
    {
        $project->delete();

        return redirect()->route('projects.index')
            ->with('success', __('projects.deleted_successfully'));
    }

    /**
     * Restore a soft deleted project.
     */
    public function restore($id)
    {
        $project = Project::withTrashed()->findOrFail($id);
        $project->restore();

        return redirect()->route('projects.index')
            ->with('success', __('projects.restored_successfully'));
    }
    
    /**
     * Permanently delete a project.
     */
    public function forceDelete($id)
    {
        $project = Project::withTrashed()->findOrFail($id);
        $project->forceDelete();

        return redirect()->route('projects.index')
            ->with('success', __('projects.permanently_deleted'));
    }

    
}