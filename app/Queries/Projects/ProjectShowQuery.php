<?php

namespace App\Queries\Projects;

use App\Models\Project;
use Illuminate\Support\Collection;

/**
 * Query for the project show page.
 *
 * Fetches the latest N items for each tab: tasks, meetings, payments, costs, documents.
 * Also returns total counts for each relation (used for "view all" links).
 * Sets the project relation on each item to prevent N+1 queries.
 */
class ProjectShowQuery
{
    public function __construct(
        private Project $project,
        private int $limit = 10
    ) {}

    public function handle(): array
    {
        return [
            'tasks' => $this->getTasks(),
            'tasksCount' => $this->project->tasks()->count(),
            'meetings' => $this->getMeetings(),
            'meetingsCount' => $this->project->meetings()->count(),
            'payments' => $this->getPayments(),
            'paymentsCount' => $this->project->payments()->count(),
            'costs' => $this->getCosts(),
            'costsCount' => $this->project->costs()->count(),
            'documents' => $this->getDocuments(),
            'documentsCount' => $this->project->documents()->count(),
        ];
    }

    private function getTasks(): Collection
    {
        return $this->project->tasks()
            ->orderBy('order')
            ->latest()
            ->take($this->limit)
            ->get()
            ->each->setRelation('project', $this->project);
    }

    private function getMeetings(): Collection
    {
        return $this->project->meetings()
            ->latest('scheduled_at')
            ->take($this->limit)
            ->get()
            ->each->setRelation('project', $this->project);
    }

    private function getPayments(): Collection
    {
        return $this->project->payments()
            ->latest('paid_at')
            ->take($this->limit)
            ->get()
            ->each->setRelation('project', $this->project);
    }

    private function getCosts(): Collection
    {
        return $this->project->costs()
            ->latest('paid_at')
            ->take($this->limit)
            ->get()
            ->each->setRelation('project', $this->project);
    }

    private function getDocuments(): Collection
    {
        return $this->project->documents()
            ->with('labels')
            ->latest('uploaded_at')
            ->take($this->limit)
            ->get()
            ->each->setRelation('project', $this->project);
    }
}
