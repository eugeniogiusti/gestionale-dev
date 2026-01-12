{{-- Sticky Header --}}
<div class="sticky top-0 z-10 bg-white dark:bg-gray-900 border-b border-gray-200 dark:border-gray-700 -mx-6 px-6 py-4 mb-6">
    <div class="flex items-center justify-between">
        {{-- Left: Back button + Title --}}
        <div class="flex items-center gap-4">
            <a href="{{ route('projects.index') }}" 
               class="text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-white transition">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                </svg>
            </a>
            
            <div>
                <h1 class="text-2xl font-bold text-gray-900 dark:text-white">
                    {{ $project->name }}
                </h1>
                <div class="flex items-center gap-2 mt-1">
                    @php
                        $statusConfig = [
                            'draft' => ['color' => 'gray', 'icon' => '📝'],
                            'in_progress' => ['color' => 'blue', 'icon' => '🔄'],
                            'completed' => ['color' => 'green', 'icon' => '✅'],
                            'archived' => ['color' => 'gray', 'icon' => '📦'],
                        ];
                        
                        $priorityConfig = [
                            'low' => ['color' => 'gray', 'icon' => '🔽'],
                            'medium' => ['color' => 'yellow', 'icon' => '➡️'],
                            'high' => ['color' => 'red', 'icon' => '⚠️'],
                        ];
                        
                        $statusInfo = $statusConfig[$project->status] ?? ['color' => 'gray', 'icon' => '❓'];
                        $priorityInfo = $project->priority ? ($priorityConfig[$project->priority] ?? null) : null;
                    @endphp
                    
                    <span class="inline-flex items-center gap-1 px-2.5 py-0.5 rounded-full text-xs font-medium bg-{{ $statusInfo['color'] }}-100 text-{{ $statusInfo['color'] }}-800 dark:bg-{{ $statusInfo['color'] }}-900 dark:text-{{ $statusInfo['color'] }}-300">
                        {{ $statusInfo['icon'] }} {{ __('projects.status_' . $project->status) }}
                    </span>
                    
                    @if($priorityInfo)
                        <span class="inline-flex items-center gap-1 px-2.5 py-0.5 rounded-full text-xs font-medium bg-{{ $priorityInfo['color'] }}-100 text-{{ $priorityInfo['color'] }}-800 dark:bg-{{ $priorityInfo['color'] }}-900 dark:text-{{ $priorityInfo['color'] }}-300">
                            {{ $priorityInfo['icon'] }} {{ __('projects.priority_' . $project->priority) }}
                        </span>
                    @endif
                </div>
            </div>
        </div>

        {{-- Right: Quick actions --}}
        <div class="flex items-center gap-2">
            <a href="{{ route('projects.edit', ['project' => $project, 'back' => 'show']) }}" 
               class="inline-flex items-center gap-2 px-4 py-2 bg-emerald-600 hover:bg-emerald-700 text-white rounded-lg transition">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                </svg>
                {{ __('projects.edit') }}
            </a>
        </div>
    </div>
</div>