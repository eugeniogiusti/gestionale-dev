<?php

namespace App\Http\Controllers\Tasks;

use App\Http\Controllers\Controller;
use App\Http\Requests\Tasks\StoreTaskDocumentRequest;
use App\Models\Project;
use App\Models\Task;
use App\Models\TaskDocument;
use App\Services\Tasks\TaskDocumentService;

class TaskDocumentController extends Controller
{
    public function __construct(
        private TaskDocumentService $taskDocumentService
    ) {}

    /**
     * Store a new document attached to a task
     */
    public function store(StoreTaskDocumentRequest $request, Project $project, Task $task)
    {
        $this->taskDocumentService->upload(
            $task,
            $request->file('file'),
            $request->validated()
        );

        return redirect()
            ->route('projects.show', ['project' => $project, 'tab' => 'tasks'])
            ->with('success', __('task_documents.created_successfully'));
    }

    /**
     * Delete a task document
     */
    public function destroy(Project $project, Task $task, TaskDocument $taskDocument)
    {
        $this->taskDocumentService->delete($taskDocument);

        return redirect()
            ->route('projects.show', ['project' => $project, 'tab' => 'tasks'])
            ->with('success', __('task_documents.deleted_successfully'));
    }

    /**
     * Download a task document
     */
    public function download(Project $project, Task $task, TaskDocument $taskDocument)
    {
        return $this->taskDocumentService->download($taskDocument);
    }

    /**
     * Preview a task document inline
     */
    public function preview(Project $project, Task $task, TaskDocument $taskDocument)
    {
        return $this->taskDocumentService->preview($taskDocument);
    }
}
