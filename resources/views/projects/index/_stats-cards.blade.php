{{-- Stats Cards - Progetti --}}
<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-6">
    
    {{-- Totale Progetti --}}
    <div class="bg-gradient-to-br from-blue-50 to-blue-100 dark:from-blue-900/20 dark:to-blue-800/20 rounded-lg p-6 border border-blue-200 dark:border-blue-800 hover:shadow-lg transition-all duration-200 group">
        <div class="flex items-center justify-between mb-3">
            <span class="text-3xl group-hover:scale-110 transition-transform">📦</span>
            <div class="text-right">
                <p class="text-xs font-medium text-blue-700 dark:text-blue-300 uppercase tracking-wide">
                    {{ __('projects.stats.total') }}
                </p>
                <p class="text-3xl font-bold text-gray-900 dark:text-white mt-1">
                    {{ $stats['total'] }}
                </p>
            </div>
        </div>
        <div class="flex items-center gap-1 text-sm">
            <span class="text-green-600 dark:text-green-400 font-medium">↗ +{{ $stats['new_this_month'] }}</span>
            <span class="text-gray-600 dark:text-gray-400">{{ __('projects.stats.this_month') }}</span>
        </div>
    </div>

    {{-- In Corso --}}
    <div class="bg-gradient-to-br from-purple-50 to-purple-100 dark:from-purple-900/20 dark:to-purple-800/20 rounded-lg p-6 border border-purple-200 dark:border-purple-800 hover:shadow-lg transition-all duration-200 group">
        <div class="flex items-center justify-between mb-3">
            <span class="text-3xl group-hover:scale-110 transition-transform">🔄</span>
            <div class="text-right">
                <p class="text-xs font-medium text-purple-700 dark:text-purple-300 uppercase tracking-wide">
                    {{ __('projects.stats.in_progress') }}
                </p>
                <p class="text-3xl font-bold text-gray-900 dark:text-white mt-1">
                    {{ $stats['in_progress'] }}
                </p>
            </div>
        </div>
        <div class="flex items-center gap-1 text-sm">
            <span class="text-gray-600 dark:text-gray-400">{{ $stats['in_progress_percentage'] }}% {{ __('projects.stats.of_total') }}</span>
        </div>
    </div>

    {{-- Completati --}}
    <div class="bg-gradient-to-br from-green-50 to-green-100 dark:from-green-900/20 dark:to-green-800/20 rounded-lg p-6 border border-green-200 dark:border-green-800 hover:shadow-lg transition-all duration-200 group">
        <div class="flex items-center justify-between mb-3">
            <span class="text-3xl group-hover:scale-110 transition-transform">✅</span>
            <div class="text-right">
                <p class="text-xs font-medium text-green-700 dark:text-green-300 uppercase tracking-wide">
                    {{ __('projects.stats.completed') }}
                </p>
                <p class="text-3xl font-bold text-gray-900 dark:text-white mt-1">
                    {{ $stats['completed'] }}
                </p>
            </div>
        </div>
        <div class="flex items-center gap-1 text-sm">
            <span class="text-green-600 dark:text-green-400 font-medium">↗ +{{ $stats['completed_this_week'] }}</span>
            <span class="text-gray-600 dark:text-gray-400">{{ __('projects.stats.this_week') }}</span>
        </div>
    </div>

    {{-- Archiviati --}}
    <div class="bg-gradient-to-br from-gray-50 to-gray-100 dark:from-gray-800/50 dark:to-gray-700/50 rounded-lg p-6 border border-gray-200 dark:border-gray-700 hover:shadow-lg transition-all duration-200 group">
        <div class="flex items-center justify-between mb-3">
            <span class="text-3xl group-hover:scale-110 transition-transform">📦</span>
            <div class="text-right">
                <p class="text-xs font-medium text-gray-700 dark:text-gray-300 uppercase tracking-wide">
                    {{ __('projects.stats.archived') }}
                </p>
                <p class="text-3xl font-bold text-gray-900 dark:text-white mt-1">
                    {{ $stats['archived'] }}
                </p>
            </div>
        </div>
        <div class="flex items-center gap-1 text-sm">
            <span class="text-gray-600 dark:text-gray-400">{{ $stats['archived_percentage'] }}% {{ __('projects.stats.of_total') }}</span>
        </div>
    </div>

</div>