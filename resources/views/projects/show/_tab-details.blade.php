<div class="grid grid-cols-1 md:grid-cols-2 gap-6">
    
    {{-- Status --}}
    <div class="bg-gradient-to-br from-blue-50 to-blue-100 dark:from-blue-900/20 dark:to-blue-800/20 rounded-lg p-5 border border-blue-200 dark:border-blue-800">
        <span class="text-sm font-medium text-blue-700 dark:text-blue-300 uppercase tracking-wide">
            {{ __('projects.status') }}
        </span>
        
        @php
            $statusConfig = [
                'draft' => ['icon' => '📝', 'label' => __('projects.status_draft')],
                'in_progress' => ['icon' => '🔄', 'label' => __('projects.status_in_progress')],
                'completed' => ['icon' => '✅', 'label' => __('projects.status_completed')],
                'archived' => ['icon' => '📦', 'label' => __('projects.status_archived')],
            ];
            $statusInfo = $statusConfig[$project->status] ?? ['icon' => '❓', 'label' => $project->status];
        @endphp
        
        <div class="flex items-center gap-2 mt-2">
            <span class="text-2xl">{{ $statusInfo['icon'] }}</span>
            <span class="text-lg font-bold text-gray-900 dark:text-white">
                {{ $statusInfo['label'] }}
            </span>
        </div>
    </div>

    {{-- Priority --}}
    <div class="bg-gradient-to-br from-yellow-50 to-yellow-100 dark:from-yellow-900/20 dark:to-yellow-800/20 rounded-lg p-5 border border-yellow-200 dark:border-yellow-800">
        <span class="text-sm font-medium text-yellow-700 dark:text-yellow-300 uppercase tracking-wide">
            {{ __('projects.priority') }}
        </span>
        
        @if($project->priority)
            @php
                $priorityConfig = [
                    'low' => ['icon' => '🔽', 'label' => __('projects.priority_low')],
                    'medium' => ['icon' => '➡️', 'label' => __('projects.priority_medium')],
                    'high' => ['icon' => '⚠️', 'label' => __('projects.priority_high')],
                ];
                $priorityInfo = $priorityConfig[$project->priority] ?? ['icon' => '❓', 'label' => $project->priority];
            @endphp
            
            <div class="flex items-center gap-2 mt-2">
                <span class="text-2xl">{{ $priorityInfo['icon'] }}</span>
                <span class="text-lg font-bold text-gray-900 dark:text-white">
                    {{ $priorityInfo['label'] }}
                </span>
            </div>
        @else
            <p class="text-sm text-gray-500 dark:text-gray-400 italic mt-2">
                {{ __('projects.no_priority') }}
            </p>
        @endif
    </div>

    {{-- Created At --}}
    <div class="bg-gradient-to-br from-gray-50 to-gray-100 dark:from-gray-800/50 dark:to-gray-700/50 rounded-lg p-5 border border-gray-200 dark:border-gray-700">
        <span class="text-sm font-medium text-gray-700 dark:text-gray-300 uppercase tracking-wide">
            {{ __('projects.created_at') }}
        </span>
        <div class="mt-2 flex items-center gap-2">
            <span class="text-xl">📅</span>
            <div>
                <p class="text-lg font-bold text-gray-900 dark:text-white">
                    {{ $project->created_at->format('d/m/Y') }}
                </p>
                <p class="text-xs text-gray-500 dark:text-gray-400">
                    {{ $project->created_at->format('H:i') }}
                </p>
            </div>
        </div>
    </div>

    {{-- Updated At --}}
    <div class="bg-gradient-to-br from-gray-50 to-gray-100 dark:from-gray-800/50 dark:to-gray-700/50 rounded-lg p-5 border border-gray-200 dark:border-gray-700">
        <span class="text-sm font-medium text-gray-700 dark:text-gray-300 uppercase tracking-wide">
            {{ __('projects.updated_at') }}
        </span>
        <div class="mt-2 flex items-center gap-2">
            <span class="text-xl">🔄</span>
            <div>
                <p class="text-lg font-bold text-gray-900 dark:text-white">
                    {{ $project->updated_at->format('d/m/Y') }}
                </p>
                <p class="text-xs text-gray-500 dark:text-gray-400">
                    {{ $project->updated_at->diffForHumans() }}
                </p>
            </div>
        </div>
    </div>

</div>