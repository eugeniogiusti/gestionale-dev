@props(['type'])

@php
    $config = match($type) {
        'hosting' => [
            'bg' => 'bg-blue-100 text-blue-800 dark:bg-blue-900/30 dark:text-blue-300',
            'icon' => '🌐',
        ],
        'api' => [
            'bg' => 'bg-purple-100 text-purple-800 dark:bg-purple-900/30 dark:text-purple-300',
            'icon' => '🔌',
        ],
        'tool' => [
            'bg' => 'bg-orange-100 text-orange-800 dark:bg-orange-900/30 dark:text-orange-300',
            'icon' => '🛠️',
        ],
        'license' => [
            'bg' => 'bg-green-100 text-green-800 dark:bg-green-900/30 dark:text-green-300',
            'icon' => '📜',
        ],
        'ads' => [
            'bg' => 'bg-pink-100 text-pink-800 dark:bg-pink-900/30 dark:text-pink-300',
            'icon' => '📢',
        ],
        default => [
            'bg' => 'bg-gray-100 text-gray-800 dark:bg-gray-900/30 dark:text-gray-300',
            'icon' => '❓',
        ],
    };
@endphp

<span {{ $attributes->merge(['class' => "inline-flex items-center gap-1 px-2.5 py-0.5 rounded-full text-xs font-medium {$config['bg']}"]) }}>
    <span>{{ $config['icon'] }}</span>
    <span>{{ __('costs.type_' . $type) }}</span>
</span>