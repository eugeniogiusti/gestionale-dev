<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\Task;
use App\Http\Requests\StoreTaskRequest;
use App\Http\Requests\UpdateTaskRequest;
use App\Queries\TaskIndexQuery;
use App\Queries\TaskStatsQuery;

class TaskController extends Controller
{
    
    /**
     * Retrieves paginated Task with applied filters and calculates
     * aggregated statistics for index page cards.
     */
    public function index(TaskIndexQuery $indexQuery, TaskStatsQuery $statsQuery)
    {
        $tasks = $indexQuery->handle();
        $stats = $statsQuery->handle();
        
        return view('tasks.index', compact('tasks', 'stats'));
    }


    /**
     * Store a new task (from project show page)
     */
    public function store(StoreTaskRequest $request, Project $project)
    {
        $project->tasks()->create($request->validated());

        return redirect()
            ->route('projects.show', ['project' => $project, 'tab' => 'tasks'])
            ->with('success', __('tasks.created_successfully'));
    }

    /**
     * Update task (from project show page)
     */
    public function update(UpdateTaskRequest $request, Project $project, Task $task)
    {
        $task->update($request->validated());

        return redirect()
            ->route('projects.show', ['project' => $project, 'tab' => 'tasks'])
            ->with('success', __('tasks.updated_successfully'));
    }

    /**
     * Delete task (from project show page)
     */
    public function destroy(Project $project, Task $task)
    {
        $task->delete();

        return redirect()
            ->route('projects.show', ['project' => $project, 'tab' => 'tasks'])
            ->with('success', __('tasks.deleted_successfully'));
    }
}