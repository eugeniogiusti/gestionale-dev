<?php

namespace App\Queries\Trash;

use App\Models\Client;
use App\Models\Project;

class TrashStatsQuery
{
    public function handle(): array
    {
        $clients = Client::onlyTrashed()->count();
        $projects = Project::onlyTrashed()->count();

        return [
            'total' => $clients + $projects,
            'clients' => $clients,
            'projects' => $projects,
        ];
    }
}
