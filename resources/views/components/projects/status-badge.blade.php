@props(['status'])

@php
    $map = [
        'draft' => ['label' => __('projects.status_draft'), 'class' => 'bg-gray-100 text-gray-800 dark:bg-gray-700 dark:text-gray-300', 'icon' => '📝'],
        'in_progress' => ['label' => __('projects.status_in_progress'), 'class' => 'bg-blue-100 text-blue-800 dark:bg-blue-900/30 dark:text-blue-200', 'icon' => '🔄'],
        'completed' => ['label' => __('projects.status_completed'), 'class' => 'bg-green-100 text-green-800 dark:bg-green-900/30 dark:text-green-200', 'icon' => '✅'],
        'archived' => ['label' => __('projects.status_archived'), 'class' => 'bg-gray-100 text-gray-600 dark:bg-gray-800 dark:text-gray-400', 'icon' => '📦'],
    ];

    $item = $map[$status] ?? ['label' => $status ?: '-', 'class' => 'bg-gray-100 text-gray-800 dark:bg-gray-800 dark:text-gray-200', 'icon' => '❓'];
@endphp

<span class="inline-flex items-center gap-1 px-2.5 py-0.5 rounded-full text-xs font-medium {{ $item['class'] }}">
    {{ $item['icon'] }} {{ $item['label'] }}
</span>