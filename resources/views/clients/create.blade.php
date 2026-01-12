<x-app-layout>
    <div class="max-w-4xl mx-auto space-y-6">
        
        @include('clients.forms._header', [
            'title' => __('clients.create_client'),
            'subtitle' => __('clients.create_client')
        ])

        @include('clients.forms._wrapper', [
            'action' => route('clients.store'),
            'method' => 'POST'
        ])

    </div>
</x-app-layout>