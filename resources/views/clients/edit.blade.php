<x-app-layout>
    <div class="max-w-4xl mx-auto space-y-6">
        
        @include('clients.forms._header', [
            'title' => __('clients.edit_client'),
            'subtitle' => $client->name
        ])

        @include('clients.forms._wrapper', [
            'client' => $client,
            'action' => route('clients.update', $client),
            'method' => 'PUT'
        ])

    </div>
</x-app-layout>