<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Http\Requests\StoreProjectRequest;
use App\Http\Requests\UpdateProjectRequest;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = Project::with('client');

        // Filter by client
        if ($request->has('client_id') && $request->client_id !== '') {
            $query->where('client_id', $request->client_id);
        }

        // Filter by status
        if ($request->has('status') && $request->status !== '') {
            $query->where('status', $request->status);
        }

        // Filter by priority
        if ($request->has('priority') && $request->priority !== '') {
            $query->where('priority', $request->priority);
        }

        // Search by name or description
        if ($request->has('search') && $request->search !== '') {
            $search = $request->search;
            $query->where(function($q) use ($search) {
                $q->where('name', 'like', "%{$search}%")
                  ->orWhere('description', 'like', "%{$search}%");
            });
        }

        // Sorting
        $sortBy = $request->get('sort_by', 'created_at');
        $sortDirection = $request->get('sort_direction', 'desc');
        $query->orderBy($sortBy, $sortDirection);

        // Pagination
        $projects = $query->paginate(15);

        return view('projects.index', compact('projects'));
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
        $data = $this->decodeHtmlEntities($request->validated());
        
        Project::create($data);

        return redirect()->route('projects.index')
            ->with('success', __('projects.created_successfully'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Project $project)
    {
        $project->load('client');
        
        return view('projects.show', compact('project'));
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
        $data = $this->decodeHtmlEntities($request->validated());
        
        $project->update($data);

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

    /**
     * Decode HTML entities from validated data
     */
    private function decodeHtmlEntities(array $data): array
    {
        $fieldsToDecode = [
            'name',
            'description',
            'notes',
        ];

        foreach ($fieldsToDecode as $field) {
            if (isset($data[$field]) && is_string($data[$field])) {
                $data[$field] = html_entity_decode($data[$field], ENT_QUOTES, 'UTF-8');
            }
        }

        return $data;
    }


        /**
     * Search clients for autocomplete (API endpoint)
     */
    public function searchClients(Request $request)
    {
        $query = $request->get('q', '');
        
        if (strlen($query) < 2) {
            return response()->json([]);
        }
        
        $clients = \App\Models\Client::where('name', 'like', "%{$query}%")
            ->orWhere('email', 'like', "%{$query}%")
            ->limit(10)
            ->get(['id', 'name', 'email']);
        
        return response()->json($clients);
    }


}