<!-- resources/views/components/alert.blade.php -->
@props([
    'type' => 'info', // success, error, warning, info
    'dismissible' => false,
])

@php
    $typeConfig = [
        'success' => [
            'bg' => 'bg-green-50 dark:bg-green-900/20',
            'border' => 'border-green-200 dark:border-green-800',
            'text' => 'text-green-800 dark:text-green-200',
            'icon' => '✓',
        ],
        'error' => [
            'bg' => 'bg-red-50 dark:bg-red-900/20',
            'border' => 'border-red-200 dark:border-red-800',
            'text' => 'text-red-800 dark:text-red-200',
            'icon' => '✕',
        ],
        'warning' => [
            'bg' => 'bg-yellow-50 dark:bg-yellow-900/20',
            'border' => 'border-yellow-200 dark:border-yellow-800',
            'text' => 'text-yellow-800 dark:text-yellow-200',
            'icon' => '⚠',
        ],
        'info' => [
            'bg' => 'bg-blue-50 dark:bg-blue-900/20',
            'border' => 'border-blue-200 dark:border-blue-800',
            'text' => 'text-blue-800 dark:text-blue-200',
            'icon' => 'ℹ',
        ],
    ];
    
    $config = $typeConfig[$type];
@endphp

<div 
    x-data="{ show: true }" 
    x-show="show"
    x-transition
    {{ $attributes->merge([
        'class' => "border-l-4 p-4 rounded-lg {$config['bg']} {$config['border']}"
    ]) }}
    role="alert"
>
    <div class="flex items-start">
        <div class="flex-shrink-0">
            <span class="text-xl">{{ $config['icon'] }}</span>
        </div>
        <div class="ml-3 flex-1 {{ $config['text'] }}">
            {{ $slot }}
        </div>
        @if($dismissible)
            <button 
                @click="show = false"
                class="ml-3 flex-shrink-0 {{ $config['text'] }} hover:opacity-70"
            >
                <span class="text-xl">×</span>
            </button>
        @endif
    </div>
</div>