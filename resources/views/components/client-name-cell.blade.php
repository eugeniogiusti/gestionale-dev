@props(['client'])

<div class="text-sm font-medium text-gray-900 dark:text-gray-100">
    {{ $client->name }}
</div>

@if(!empty($client->vat_number))
    <div class="mt-1">
        <x-vat-display :vat="$client->vat_number" />
    </div>
@endif