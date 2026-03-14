<?php

namespace App\Http\Controllers\Clients;

use App\Http\Controllers\Controller;
use App\Http\Requests\Clients\StoreClientFollowupRequest;
use App\Http\Requests\Clients\UpdateClientFollowupRequest;
use App\Models\Client;
use App\Models\ClientFollowup;

class ClientFollowupController extends Controller
{
    public function store(StoreClientFollowupRequest $request, Client $client)
    {
        $client->followups()->create($request->validated());

        return redirect()->route('clients.show', $client)->with('success', __('clients.followup.created'));
    }

    public function update(UpdateClientFollowupRequest $request, Client $client, ClientFollowup $followup)
    {
        $followup->update($request->validated());

        return redirect()->route('clients.show', $client)->with('success', __('clients.followup.updated'));
    }

    public function destroy(Client $client, ClientFollowup $followup)
    {
        $followup->delete();

        return redirect()->route('clients.show', $client)->with('success', __('clients.followup.deleted'));
    }
}
