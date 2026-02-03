@props([
    'title',
    'value',
    'icon' => null,
    'gradient' => 'emerald',
    'subtitle' => null,
    'valueColor' => null
])

@php
    $gradients = [
        'emerald' => 'from-emerald-50 to-emerald-100 dark:from-emerald-900/20 dark:to-emerald-800/20 border-emerald-200 dark:border-emerald-800',
        'blue' => 'from-blue-50 to-blue-100 dark:from-blue-900/20 dark:to-blue-800/20 border-blue-200 dark:border-blue-800',
        'red' => 'from-red-50 to-red-100 dark:from-red-900/20 dark:to-red-800/20 border-red-200 dark:border-red-800',
        'purple' => 'from-purple-50 to-purple-100 dark:from-purple-900/20 dark:to-purple-800/20 border-purple-200 dark:border-purple-800',
    ];
    
    $titleColors = [
        'emerald' => 'text-emerald-700 dark:text-emerald-300',
        'blue' => 'text-blue-700 dark:text-blue-300',
        'red' => 'text-red-700 dark:text-red-300',
        'purple' => 'text-purple-700 dark:text-purple-300',
    ];
@endphp

<div class="bg-gradient-to-br {{ $gradients[$gradient] }} rounded-lg p-6 border hover:shadow-lg hover:scale-105 transition-all duration-200">
    <div class="flex items-center justify-between mb-3">
        <span class="text-3xl">
            @if(isset($icon) && trim((string) $icon) !== '')
                {!! $icon !!}
            @endif
        </span>
        <div class="text-right">
            <p class="text-xs font-medium {{ $titleColors[$gradient] }} uppercase tracking-wide">
                {{ $title }}
            </p>
            <p class="text-3xl font-bold {{ $valueColor ?? 'text-gray-900 dark:text-white' }} mt-1">
                {{ $value }}
            </p>
        </div>
    </div>
    @if($subtitle)
        <div class="text-sm text-gray-600 dark:text-gray-400">
            {{ $subtitle }}
        </div>
    @endif
</div>
