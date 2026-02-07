<?php

namespace App\Http\Controllers\Trash;

use App\Http\Controllers\Controller;
use App\Models\Client;
use App\Models\Project;

class TrashController extends Controller
{
    public function index()
    {
        $clients = Client::onlyTrashed()
            ->orderByDesc('deleted_at')
            ->paginate(10, ['*'], 'clients_page');

        $projects = Project::onlyTrashed()
            ->with(['client' => fn($q) => $q->withTrashed()])
            ->orderByDesc('deleted_at')
            ->paginate(10, ['*'], 'projects_page');

        $stats = [
            'clients' => $clients->total(),
            'projects' => $projects->total(),
            'total' => $clients->total() + $projects->total(),
        ];

        return view('trash.index', compact('clients', 'projects', 'stats'));
    }

    public function emptyAll()
    {
        Client::onlyTrashed()->forceDelete();
        Project::onlyTrashed()->forceDelete();

        return redirect()->route('trash.index')
            ->with('success', __('trash.emptied_successfully'));
    }
}
