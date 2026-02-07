{{-- Stats Cards - Trash --}}
<div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-6">
    {{-- Total Items --}}
    <div class="bg-gradient-to-br from-red-50 to-red-100 dark:from-red-900/20 dark:to-red-800/20 rounded-lg p-6 border border-red-200 dark:border-red-800 hover:shadow-lg hover:scale-105 transition-all duration-200 group">
        <div class="flex items-center justify-between mb-3">
            <span class="text-3xl group-hover:scale-110 transition-transform">🗑️</span>
            <div class="text-right">
                <p class="text-xs font-medium text-red-700 dark:text-red-300 uppercase tracking-wide">
                    {{ __('trash.stats.total') }}
                </p>
                <p class="text-3xl font-bold text-gray-900 dark:text-white mt-1">
                    {{ $stats['total'] }}
                </p>
            </div>
        </div>
    </div>

    {{-- Trashed Clients --}}
    <div class="bg-gradient-to-br from-orange-50 to-orange-100 dark:from-orange-900/20 dark:to-orange-800/20 rounded-lg p-6 border border-orange-200 dark:border-orange-800 hover:shadow-lg hover:scale-105 transition-all duration-200 group">
        <div class="flex items-center justify-between mb-3">
            <span class="text-3xl group-hover:scale-110 transition-transform">👥</span>
            <div class="text-right">
                <p class="text-xs font-medium text-orange-700 dark:text-orange-300 uppercase tracking-wide">
                    {{ __('trash.stats.clients') }}
                </p>
                <p class="text-3xl font-bold text-gray-900 dark:text-white mt-1">
                    {{ $stats['clients'] }}
                </p>
            </div>
        </div>
    </div>

    {{-- Trashed Projects --}}
    <div class="bg-gradient-to-br from-amber-50 to-amber-100 dark:from-amber-900/20 dark:to-amber-800/20 rounded-lg p-6 border border-amber-200 dark:border-amber-800 hover:shadow-lg hover:scale-105 transition-all duration-200 group">
        <div class="flex items-center justify-between mb-3">
            <span class="text-3xl group-hover:scale-110 transition-transform">📁</span>
            <div class="text-right">
                <p class="text-xs font-medium text-amber-700 dark:text-amber-300 uppercase tracking-wide">
                    {{ __('trash.stats.projects') }}
                </p>
                <p class="text-3xl font-bold text-gray-900 dark:text-white mt-1">
                    {{ $stats['projects'] }}
                </p>
            </div>
        </div>
    </div>
</div>
