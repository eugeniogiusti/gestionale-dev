@props(['priority'])

@if($priority)
    @php
    $colors = [
        'low' => 'bg-gray-100 text-gray-800 dark:bg-gray-700 dark:text-gray-200',
        'medium' => 'bg-yellow-100 text-yellow-800 dark:bg-yellow-900 dark:text-yellow-200',
        'high' => 'bg-red-100 text-red-800 dark:bg-red-900 dark:text-red-200',
    ];
    @endphp

    <span class="px-2 py-1 text-xs font-semibold rounded-full {{ $colors[$priority] ?? '' }}">
        {{ __('tasks.priority_' . $priority) }}
    </span>
@else
    <x-not-set-badge />
@endif