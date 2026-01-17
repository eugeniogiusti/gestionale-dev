@props(['status'])

@php
    $classes = match($status) {
        'scheduled' => 'bg-blue-100 text-blue-800 dark:bg-blue-900/30 dark:text-blue-300',
        'completed' => 'bg-green-100 text-green-800 dark:bg-green-900/30 dark:text-green-300',
        'cancelled' => 'bg-red-100 text-red-800 dark:bg-red-900/30 dark:text-red-300',
        default => 'bg-gray-100 text-gray-800 dark:bg-gray-900/30 dark:text-gray-300',
    };

    $icon = match($status) {
        'scheduled' => '📅',
        'completed' => '✅',
        'cancelled' => '❌',
        default => '❓',
    };
@endphp

<span {{ $attributes->merge(['class' => "inline-flex items-center gap-1 px-2.5 py-0.5 rounded-full text-xs font-medium {$classes}"]) }}>
    <span>{{ $icon }}</span>
    <span>{{ __('meetings.status_' . $status) }}</span>
</span>