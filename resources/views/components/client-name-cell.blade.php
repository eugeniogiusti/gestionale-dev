@props(['client'])

<a href="{{ route('clients.show', $client) }}"
   class="text-sm font-medium text-gray-900 dark:text-gray-100 hover:text-emerald-600 dark:hover:text-emerald-400 transition-colors">
    {{ $client->name }}
</a>

@if(!empty($client->vat_number))
    <div class="mt-1">
        <x-vat-display :vat="$client->vat_number" />
    </div>
@endif