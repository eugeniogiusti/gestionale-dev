@props(['status'])

@php
$colors = [
    'todo' => 'bg-gray-100 text-gray-800 dark:bg-gray-700 dark:text-gray-200',
    'in_progress' => 'bg-blue-100 text-blue-800 dark:bg-blue-900 dark:text-blue-200',
    'blocked' => 'bg-red-100 text-red-800 dark:bg-red-900 dark:text-red-200',
    'done' => 'bg-green-100 text-green-800 dark:bg-green-900 dark:text-green-200',
];
@endphp

<span class="px-2 py-1 text-xs font-semibold rounded-full {{ $colors[$status] ?? '' }}">
    {{ __('tasks.status_' . $status) }}
</span>