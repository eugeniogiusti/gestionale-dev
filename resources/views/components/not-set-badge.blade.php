{{-- Generic "not set" badge for nullable fields --}}
@props(['text' => null])

<span class="px-2 py-1 text-xs font-medium rounded-full bg-gray-100 text-gray-400 dark:bg-gray-700 dark:text-gray-500">
    {{ $text ?? __('ui.not_set') }}
</span>
