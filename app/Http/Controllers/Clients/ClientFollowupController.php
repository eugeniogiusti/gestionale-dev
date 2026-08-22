<?php

namespace App\Http\Controllers\Clients;

use App\Http\Controllers\Controller;
use App\Http\Requests\Clients\StoreClientFollowupRequest;
use App\Http\Requests\Clients\UpdateClientFollowupRequest;
use App\Models\Client;
use App\Models\ClientFollowup;
use App\Services\Calendar\GoogleCalendarSync;

class ClientFollowupController extends Controller
{
    public function __construct(
        private GoogleCalendarSync $calendarSync
    ) {}

    /**
     * Store a new follow-up for the given client.
     */
    public function store(StoreClientFollowupRequest $request, Client $client)
    {
        $client->followups()->create($request->validated());

        $this->syncClientFollowups($client);

        return redirect()->route('clients.show', $client)->with('success', __('clients.followup.created'));
    }

    /**
     * Update an existing client follow-up.
     */
    public function update(UpdateClientFollowupRequest $request, Client $client, ClientFollowup $followup)
    {
        $followup->update($request->validated());

        $this->syncClientFollowups($client);

        return redirect()->route('clients.show', $client)->with('success', __('clients.followup.updated'));
    }

    /**
     * Delete a client follow-up.
     */
    public function destroy(Client $client, ClientFollowup $followup)
    {
        $this->calendarSync->delete($followup);

        $followup->delete();

        $this->syncClientFollowups($client);

        return redirect()->route('clients.show', $client)->with('success', __('clients.followup.deleted'));
    }

    /**
     * Toggle the completed state of a client follow-up.
     */
    public function toggleComplete(Client $client, ClientFollowup $followup)
    {
        $followup->update(['completed' => !$followup->completed]);

        $this->calendarSync->sync($followup);

        return redirect()->route('clients.show', $client)->with('success', __('clients.followup.updated'));
    }

    /**
     * Re-sync every follow-up of the client, not just the edited one: adding,
     * deleting or re-dating one shifts the others' sequence number, which is
     * part of the calendar event title.
     */
    private function syncClientFollowups(Client $client): void
    {
        foreach ($client->followups()->get() as $followup) {
            $this->calendarSync->sync($followup->setRelation('client', $client));
        }
    }
}
