@props(['client'])

<div class="space-y-3">
    {{-- Client name --}}
    <p class="font-medium text-gray-900 dark:text-white">
        {{ $client->name }}
    </p>

    {{-- VAT --}}
    <x-vat-display :vat="$client->vat_number" />

    {{-- Email --}}
    @if(!empty($client->email))
        <x-email-link :email="$client->email" />
    @endif

    {{-- WhatsApp --}}
    @if(!empty($client->phone))
        <x-whatsapp-link :phone="$client->phone" :prefix="$client->phone_prefix" />
    @endif
</div>