@props(['client'])

@if($client)
    <div class="space-y-1">
        <div class="text-sm font-medium text-gray-900 dark:text-white">
            {{ $client->name }}
        </div>

        @if(!empty($client->vat_number))
            <x-vat-display :vat="$client->vat_number" />
        @endif
    </div>
@else
    <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium
                 bg-gray-100 text-gray-800 dark:bg-gray-700 dark:text-gray-300">
        {{ __('projects.internal_project') }}
    </span>
@endif