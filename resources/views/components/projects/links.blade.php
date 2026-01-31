@props([
    'project',
    'variant' => 'icons', // icons | list
])

@php
    $links = [
        'repo_url' => ['icon' => '🔗', 'label' => __('projects.repo_url')],
        'staging_url' => ['icon' => '🌐', 'label' => __('projects.staging_url')],
        'production_url' => ['icon' => '✅', 'label' => __('projects.production_url')],
        'figma_url' => ['icon' => '📐', 'label' => __('projects.figma_url')],
        'docs_url' => ['icon' => '📚', 'label' => __('projects.docs_url')],
    ];

    $items = collect($links)
        ->map(function ($cfg, $field) use ($project) {
            $url = $project->$field ?? null;
            return $url ? ['url' => $url, 'icon' => $cfg['icon'], 'label' => $cfg['label']] : null;
        })
        ->filter()
        ->values();

    $hasLinks = $items->isNotEmpty();
@endphp

@if($hasLinks)
    @if($variant === 'list')
        <div class="space-y-2">
            @foreach($items as $item)
                <a href="{{ $item['url'] }}" target="_blank"
                   class="flex items-center gap-2 px-3 py-2 text-sm
                          bg-gray-50 dark:bg-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600
                          rounded-lg transition group">
                    <span class="text-lg">{{ $item['icon'] }}</span>
                    <span class="text-gray-700 dark:text-gray-300 group-hover:text-emerald-600 dark:group-hover:text-emerald-400">
                        {{ $item['label'] }}
                    </span>
                </a>
            @endforeach
        </div>
    @else
        <div class="flex items-center gap-2">
            @foreach($items as $item)
                <a href="{{ $item['url'] }}" target="_blank"
                   class="text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white transition"
                   title="{{ $item['label'] }}">
                    {{ $item['icon'] }}
                </a>
            @endforeach
        </div>
    @endif
@else
    @if($variant === 'list')
        <p class="text-sm text-gray-500 dark:text-gray-400 italic py-2">
            {{ __('projects.no_links') }}
        </p>
    @else
        <span class="text-gray-400 dark:text-gray-600" title="{{ __('projects.no_links') }}">📭</span>
    @endif
@endif