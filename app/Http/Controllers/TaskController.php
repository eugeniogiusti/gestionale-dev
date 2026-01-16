<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\Task;
use App\Http\Requests\StoreTaskRequest;
use App\Http\Requests\UpdateTaskRequest;
use App\Queries\TaskIndexQuery;

class TaskController extends Controller
{
    /**
     * Display a listing of tasks (global index with filters)
     */
    public function index(TaskIndexQuery $query)
    {
        $tasks = $query->handle();
        
        return view('tasks.index', compact('tasks'));
    }

    /**
     * Store a new task (from project show page)
     */
    public function store(StoreTaskRequest $request, Project $project)
    {
        $project->tasks()->create($request->validated());

        return redirect()
            ->route('projects.show', $project)
            ->withFragment('tasks')
            ->with('success', __('tasks.created_successfully'));
    }

    /**
     * Update task (from project show page)
     */
    public function update(UpdateTaskRequest $request, Project $project, Task $task)
    {
        $task->update($request->validated());

        return redirect()
            ->route('projects.show', $project)
            ->withFragment('tasks')
            ->with('success', __('tasks.updated_successfully'));
    }

    /**
     * Delete task (from project show page)
     */
    public function destroy(Project $project, Task $task)
    {
        $task->delete();

        return redirect()
            ->route('projects.show', $project)
            ->withFragment('tasks')
            ->with('success', __('tasks.deleted_successfully'));
    }
}