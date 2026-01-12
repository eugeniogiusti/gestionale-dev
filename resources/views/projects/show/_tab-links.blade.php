@php
    $links = [
        'repo_url' => ['icon' => '🔗', 'label' => __('projects.repo_url'), 'color' => 'purple'],
        'staging_url' => ['icon' => '🌐', 'label' => __('projects.staging_url'), 'color' => 'blue'],
        'production_url' => ['icon' => '✅', 'label' => __('projects.production_url'), 'color' => 'green'],
        'figma_url' => ['icon' => '📐', 'label' => __('projects.figma_url'), 'color' => 'pink'],
        'docs_url' => ['icon' => '📚', 'label' => __('projects.docs_url'), 'color' => 'yellow'],
    ];
    
    $hasAnyLink = collect($links)->keys()->some(fn($key) => !empty($project->$key));
@endphp

<div class="space-y-4">
    @if($hasAnyLink)
        @foreach($links as $key => $config)
            @if($project->$key)
                <div class="group bg-gradient-to-r from-{{ $config['color'] }}-50 to-white dark:from-{{ $config['color'] }}-900/10 dark:to-gray-800 rounded-lg p-5 border border-{{ $config['color'] }}-200 dark:border-{{ $config['color'] }}-800 hover:shadow-md transition">
                    <div class="flex items-center gap-3">
                        <span class="text-2xl">{{ $config['icon'] }}</span>
                        <div class="flex-1 min-w-0">
                            <p class="text-sm font-medium text-{{ $config['color'] }}-700 dark:text-{{ $config['color'] }}-300 mb-1">
                                {{ $config['label'] }}
                            </p>
                            <a href="{{ $project->$key }}" 
                               target="_blank"
                               class="text-sm text-gray-600 dark:text-gray-400 hover:text-emerald-600 dark:hover:text-emerald-400 truncate block group-hover:underline">
                                {{ $project->$key }}
                            </a>
                        </div>
                        <a href="{{ $project->$key }}" 
                           target="_blank"
                           class="px-3 py-1.5 bg-white dark:bg-gray-700 hover:bg-{{ $config['color'] }}-100 dark:hover:bg-{{ $config['color'] }}-900/30 rounded-lg text-sm font-medium text-{{ $config['color'] }}-700 dark:text-{{ $config['color'] }}-300 border border-{{ $config['color'] }}-300 dark:border-{{ $config['color'] }}-700 transition">
                            Apri →
                        </a>
                    </div>
                </div>
            @endif
        @endforeach
    @else
        <div class="text-center py-12">
            <span class="text-6xl">🔗</span>
            <p class="mt-4 text-lg font-medium text-gray-900 dark:text-white">
                {{ __('projects.no_links_configured') }}
            </p>
        </div>
    @endif
</div>