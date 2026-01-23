<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Http\Requests\StoreClientRequest;
use App\Http\Requests\UpdateClientRequest;
use App\Queries\ClientIndexQuery;
use App\Queries\ClientStatsQuery;

class ClientController extends Controller
{
    public function index()
    {
        $clients = (new ClientIndexQuery())->handle();
        $stats = (new ClientStatsQuery())->handle();
        
        return view('clients.index', compact('clients', 'stats'));
    }

    public function store(StoreClientRequest $request)
    {
        Client::create($request->validated());

        return redirect()->route('clients.index')
            ->with('success', __('clients.created_successfully'));
    }

    public function show(Client $client)
    {
        return view('clients.show', compact('client'));
    }

    public function update(UpdateClientRequest $request, Client $client)
    {
        $client->update($request->validated());

        return redirect()->route('clients.index')
            ->with('success', __('clients.updated_successfully'));
    }

    public function destroy(Client $client)
    {
        $client->delete();

        return redirect()->route('clients.index')
            ->with('success', __('clients.deleted_successfully'));
    }

    public function restore($id)
    {
        $client = Client::withTrashed()->findOrFail($id);
        $client->restore();

        return redirect()->route('clients.index')
            ->with('success', __('clients.restored_successfully'));
    }

    public function forceDelete($id)
    {
        $client = Client::withTrashed()->findOrFail($id);
        $client->forceDelete();

        return redirect()->route('clients.index')
            ->with('success', __('clients.permanently_deleted'));
    }
}