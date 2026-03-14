{{-- Quick action buttons — only shown if contact info is available --}}
@if($client->phone || $client->email)
<div class="flex flex-wrap gap-2">

    @if($client->phone)
        <a href="tel:{{ $client->phone_prefix }}{{ $client->phone }}"
           class="inline-flex items-center gap-1.5 text-sm px-3 py-1.5 border border-gray-200 dark:border-gray-600 rounded-lg text-gray-700 dark:text-gray-300 hover:bg-gray-50 dark:hover:bg-gray-700 transition">
            <x-followup-type-icon type="call" />
            {{ __('clients.followup.action_call') }}
        </a>

        <x-whatsapp-link :href="$client->whatsappUrl()">{{ $client->phone_prefix }} {{ $client->phone }}</x-whatsapp-link>
    @endif

    @if($client->email)
        <x-email-link :email="$client->email" />
    @endif

</div>
@endif
