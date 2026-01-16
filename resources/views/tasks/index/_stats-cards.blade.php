{{-- Stats Cards - Task --}}
<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-6">
    
    {{-- To-Do --}}
    <div class="bg-gradient-to-br from-blue-50 to-blue-100 dark:from-blue-900/20 dark:to-blue-800/20 rounded-lg p-6 border border-blue-200 dark:border-blue-800 hover:shadow-lg transition-all duration-200 group">
        <div class="flex items-center justify-between mb-3">
            <span class="text-3xl group-hover:scale-110 transition-transform">📋</span>
            <div class="text-right">
                <p class="text-xs font-medium text-blue-700 dark:text-blue-300 uppercase tracking-wide">
                    {{ __('tasks.stats.todo') }}
                </p>
                <p class="text-3xl font-bold text-gray-900 dark:text-white mt-1">
                    {{ $stats['todo'] }}
                </p>
            </div>
        </div>
        <div class="flex items-center gap-1 text-sm">
            <span class="text-gray-600 dark:text-gray-400">{{ __('tasks.stats.backlog') }}</span>
        </div>
    </div>

    {{-- In Progress --}}
    <div class="bg-gradient-to-br from-purple-50 to-purple-100 dark:from-purple-900/20 dark:to-purple-800/20 rounded-lg p-6 border border-purple-200 dark:border-purple-800 hover:shadow-lg transition-all duration-200 group">
        <div class="flex items-center justify-between mb-3">
            <span class="text-3xl group-hover:scale-110 transition-transform">🔄</span>
            <div class="text-right">
                <p class="text-xs font-medium text-purple-700 dark:text-purple-300 uppercase tracking-wide">
                    {{ __('tasks.stats.in_progress') }}
                </p>
                <p class="text-3xl font-bold text-gray-900 dark:text-white mt-1">
                    {{ $stats['in_progress'] }}
                </p>
            </div>
        </div>
        <div class="flex items-center gap-1 text-sm">
            <span class="text-gray-600 dark:text-gray-400">{{ __('tasks.stats.working_on') }}</span>
        </div>
    </div>

    {{-- Blocked --}}
    <div class="bg-gradient-to-br from-orange-50 to-orange-100 dark:from-orange-900/20 dark:to-orange-800/20 rounded-lg p-6 border border-orange-200 dark:border-orange-800 hover:shadow-lg transition-all duration-200 group">
        <div class="flex items-center justify-between mb-3">
            <span class="text-3xl group-hover:scale-110 transition-transform">🚧</span>
            <div class="text-right">
                <p class="text-xs font-medium text-orange-700 dark:text-orange-300 uppercase tracking-wide">
                    {{ __('tasks.stats.blocked') }}
                </p>
                <p class="text-3xl font-bold text-gray-900 dark:text-white mt-1">
                    {{ $stats['blocked'] }}
                </p>
            </div>
        </div>
        <div class="flex items-center gap-1 text-sm">
            @if($stats['blocked'] > 0)
                <span class="text-orange-600 dark:text-orange-400 font-medium">⚠️</span>
            @endif
            <span class="text-gray-600 dark:text-gray-400">{{ __('tasks.stats.need_attention') }}</span>
        </div>
    </div>

    {{-- Open Bugs --}}
    <div class="bg-gradient-to-br from-red-50 to-red-100 dark:from-red-900/20 dark:to-red-800/20 rounded-lg p-6 border border-red-200 dark:border-red-800 hover:shadow-lg transition-all duration-200 group">
        <div class="flex items-center justify-between mb-3">
            <span class="text-3xl group-hover:scale-110 transition-transform">🐛</span>
            <div class="text-right">
                <p class="text-xs font-medium text-red-700 dark:text-red-300 uppercase tracking-wide">
                    {{ __('tasks.stats.bugs_open') }}
                </p>
                <p class="text-3xl font-bold text-gray-900 dark:text-white mt-1">
                    {{ $stats['bugs_open'] }}
                </p>
            </div>
        </div>
        <div class="flex items-center gap-1 text-sm">
            @if($stats['bugs_open'] > 0)
                <span class="text-red-600 dark:text-red-400 font-medium">🔥</span>
            @endif
            <span class="text-gray-600 dark:text-gray-400">{{ __('tasks.stats.to_fix') }}</span>
        </div>
    </div>

</div>