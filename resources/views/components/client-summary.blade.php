@props(['client'])

<div class="space-y-3">
    {{-- Client name --}}
    <a href="{{ route('clients.show', $client) }}" class="font-medium text-blue-600 hover:text-blue-800 dark:text-blue-400 dark:hover:text-blue-300 hover:underline">
        {{ $client->name }}
    </a>

    {{-- VAT --}}
    <x-vat-display :vat="$client->vat_number" />

    {{-- Email --}}
    @if(!empty($client->email))
        <x-email-link :email="$client->email" />
    @endif

    {{-- WhatsApp --}}
    <x-whatsapp-link :href="$client->whatsappUrl()">{{ $client->phone_prefix }} {{ $client->phone }}</x-whatsapp-link>
</div>