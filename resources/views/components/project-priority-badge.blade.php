@props(['priority'])

@php
    $map = [
        'low' => ['label' => __('projects.priority_low'), 'class' => 'bg-gray-100 text-gray-600 dark:bg-gray-700 dark:text-gray-400', 'icon' => '🔽'],
        'medium' => ['label' => __('projects.priority_medium'), 'class' => 'bg-yellow-100 text-yellow-800 dark:bg-yellow-900/30 dark:text-yellow-200', 'icon' => '➡️'],
        'high' => ['label' => __('projects.priority_high'), 'class' => 'bg-red-100 text-red-800 dark:bg-red-900/30 dark:text-red-200', 'icon' => '⚠️'],
    ];

    $item = $map[$priority] ?? null;
@endphp

@if($item)
    <span class="inline-flex items-center gap-1 px-2.5 py-0.5 rounded-full text-xs font-medium {{ $item['class'] }}">
        {{ $item['icon'] }} {{ $item['label'] }}
    </span>
@else
    <span class="text-gray-400 dark:text-gray-600">-</span>
@endif