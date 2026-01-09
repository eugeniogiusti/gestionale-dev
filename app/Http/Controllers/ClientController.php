<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Http\Requests\StoreClientRequest;
use App\Http\Requests\UpdateClientRequest;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = Client::query();

        // Filtro per status (se presente)
        if ($request->has('status') && $request->status !== '') {
            $query->where('status', $request->status);
        }

        // Ricerca per nome o email
        if ($request->has('search') && $request->search !== '') {
            $search = $request->search;
            $query->where(function($q) use ($search) {
                $q->where('name', 'like', "%{$search}%")
                  ->orWhere('email', 'like', "%{$search}%");
            });
        }

        // Ordinamento
        $sortBy = $request->get('sort_by', 'created_at');
        $sortDirection = $request->get('sort_direction', 'desc');
        $query->orderBy($sortBy, $sortDirection);

        // Pagination
        $clients = $query->paginate(15);

        return view('clients.index', compact('clients'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $statuses = Client::getStatusOptions();
        
        return view('clients.create', compact('statuses'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreClientRequest $request)
    {
    $data = $this->decodeHtmlEntities($request->validated());
    
    Client::create($data);

    return redirect()->route('clients.index')
        ->with('success', __('clients.created_successfully'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Client $client)
    {
        return view('clients.show', compact('client'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Client $client)
    {
        $statuses = Client::getStatusOptions();
        
        return view('clients.edit', compact('client', 'statuses'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateClientRequest $request, Client $client)
    {
    $data = $this->decodeHtmlEntities($request->validated());
    
    $client->update($data);

    return redirect()->route('clients.index')
        ->with('success', __('clients.updated_successfully'));
    }

    /**
     * Remove the specified resource from storage (soft delete).
     */
    public function destroy(Client $client)
    {
        $client->delete(); // Soft delete

        return redirect()->route('clients.index')
            ->with('success', __('clients.deleted_successfully'));
    }

    /**
     * Restore a soft deleted client.
     */
    public function restore($id)
    {
        $client = Client::withTrashed()->findOrFail($id);
        $client->restore();

        return redirect()->route('clients.index')
            ->with('success', __('clients.restored_successfully'));
    }

    /**
     * Permanently delete a client.
     */
    public function forceDelete($id)
    {
        $client = Client::withTrashed()->findOrFail($id);
        $client->forceDelete();

        return redirect()->route('clients.index')
            ->with('success', __('clients.permanently_deleted'));
    }

        /**
     * Decode HTML entities from validated data
     */
    private function decodeHtmlEntities(array $data): array
    {
        $fieldsTodecode = [
            'name',
            'billing_address',
            'billing_city',
            'notes',
        ];

        foreach ($fieldsTodecode as $field) {
            if (isset($data[$field]) && is_string($data[$field])) {
                $data[$field] = html_entity_decode($data[$field], ENT_QUOTES, 'UTF-8');
            }
        }

        return $data;
    }
    
}