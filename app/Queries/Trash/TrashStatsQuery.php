<?php

namespace App\Queries\Trash;

use App\Models\Client;
use App\Models\Project;

/**
 * Trash statistics for the trash page header.
 *
 * Returns: total soft-deleted count, clients trashed count, projects trashed count.
 */
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
