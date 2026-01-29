<?php

namespace App\Queries\Clients;

use App\Models\Client;
use App\Models\Cost;
use App\Models\Document;
use App\Models\Meeting;
use App\Models\Payment;
use App\Models\Task;
use Illuminate\Support\Collection;

class ClientShowQuery
{
    private Collection $projectIds;

    public function __construct(
        private Client $client,
        private int $limit = 5
    ) {
        $this->projectIds = $client->projects()->pluck('id');
    }

    public function handle(): array
    {
        return [
            'projects' => $this->getProjects(),
            'tasks' => $this->getTasks(),
            'meetings' => $this->getMeetings(),
            'payments' => $this->getPayments(),
            'costs' => $this->getCosts(),
            'documents' => $this->getDocuments(),
        ];
    }

    private function getProjects()
    {
        return $this->client->projects()
            ->latest()
            ->take($this->limit)
            ->get();
    }

    private function getTasks()
    {
        return Task::whereIn('project_id', $this->projectIds)
            ->with('project:id,name')
            ->latest()
            ->take($this->limit)
            ->get();
    }

    private function getMeetings()
    {
        return Meeting::whereIn('project_id', $this->projectIds)
            ->with('project:id,name')
            ->latest('scheduled_at')
            ->take($this->limit)
            ->get();
    }

    private function getPayments()
    {
        return Payment::whereIn('project_id', $this->projectIds)
            ->with('project:id,name')
            ->latest('paid_at')
            ->take($this->limit)
            ->get();
    }

    private function getCosts()
    {
        return Cost::whereIn('project_id', $this->projectIds)
            ->with('project:id,name')
            ->latest('paid_at')
            ->take($this->limit)
            ->get();
    }

    private function getDocuments()
    {
        return Document::whereIn('project_id', $this->projectIds)
            ->with('project:id,name')
            ->latest('uploaded_at')
            ->take($this->limit)
            ->get();
    }
}
