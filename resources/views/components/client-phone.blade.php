@props(['client'])

<div class="text-sm text-gray-600 dark:text-gray-400">
    @if(!empty($client->phone))
        {{ $client->phone_prefix }} {{ $client->phone }}
    @else
        <span class="text-gray-400 dark:text-gray-600" title="{{ __('clients.no_phone') }}">📵</span>
    @endif
</div>