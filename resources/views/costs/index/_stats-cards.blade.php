{{-- Stats Cards - Costs --}}
<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-6">
    
    {{-- Total All Time --}}
    <div class="bg-gradient-to-br from-red-50 to-red-100 dark:from-red-900/20 dark:to-red-800/20 rounded-lg p-6 border border-red-200 dark:border-red-800 hover:shadow-lg transition-all duration-200 group">
        <div class="flex items-center justify-between mb-3">
            <span class="text-3xl group-hover:scale-110 transition-transform">💸</span>
            <div class="text-right">
                <p class="text-xs font-medium text-red-700 dark:text-red-300 uppercase tracking-wide">
                    {{ __('costs.stats.total_all_time') }}
                </p>
                <p class="text-3xl font-bold text-gray-900 dark:text-white mt-1">
                    € {{ number_format($stats['total_all_time'], 2, ',', '.') }}
                </p>
            </div>
        </div>
        <div class="flex items-center gap-1 text-sm">
            <span class="text-gray-600 dark:text-gray-400">{{ __('costs.stats.all_projects') }}</span>
        </div>
    </div>

    {{-- This Month --}}
    <div class="bg-gradient-to-br from-orange-50 to-orange-100 dark:from-orange-900/20 dark:to-orange-800/20 rounded-lg p-6 border border-orange-200 dark:border-orange-800 hover:shadow-lg transition-all duration-200 group">
        <div class="flex items-center justify-between mb-3">
            <span class="text-3xl group-hover:scale-110 transition-transform">📅</span>
            <div class="text-right">
                <p class="text-xs font-medium text-orange-700 dark:text-orange-300 uppercase tracking-wide">
                    {{ __('costs.stats.this_month') }}
                </p>
                <p class="text-3xl font-bold text-gray-900 dark:text-white mt-1">
                    € {{ number_format($stats['total_this_month'], 2, ',', '.') }}
                </p>
            </div>
        </div>
        <div class="flex items-center gap-1 text-sm">
            <span class="text-gray-600 dark:text-gray-400">{{ now()->format('F Y') }}</span>
        </div>
    </div>

    {{-- This Year --}}
    <div class="bg-gradient-to-br from-purple-50 to-purple-100 dark:from-purple-900/20 dark:to-purple-800/20 rounded-lg p-6 border border-purple-200 dark:border-purple-800 hover:shadow-lg transition-all duration-200 group">
        <div class="flex items-center justify-between mb-3">
            <span class="text-3xl group-hover:scale-110 transition-transform">📊</span>
            <div class="text-right">
                <p class="text-xs font-medium text-purple-700 dark:text-purple-300 uppercase tracking-wide">
                    {{ __('costs.stats.this_year') }}
                </p>
                <p class="text-3xl font-bold text-gray-900 dark:text-white mt-1">
                    € {{ number_format($stats['total_this_year'], 2, ',', '.') }}
                </p>
            </div>
        </div>
        <div class="flex items-center gap-1 text-sm">
            <span class="text-gray-600 dark:text-gray-400">{{ now()->year }}</span>
        </div>
    </div>

    {{-- Recurring Monthly --}}
    <div class="bg-gradient-to-br from-blue-50 to-blue-100 dark:from-blue-900/20 dark:to-blue-800/20 rounded-lg p-6 border border-blue-200 dark:border-blue-800 hover:shadow-lg transition-all duration-200 group">
        <div class="flex items-center justify-between mb-3">
            <span class="text-3xl group-hover:scale-110 transition-transform">🔄</span>
            <div class="text-right">
                <p class="text-xs font-medium text-blue-700 dark:text-blue-300 uppercase tracking-wide">
                    {{ __('costs.stats.recurring_monthly') }}
                </p>
                <p class="text-3xl font-bold text-gray-900 dark:text-white mt-1">
                    € {{ number_format($stats['recurring_monthly'], 2, ',', '.') }}
                </p>
            </div>
        </div>
        <div class="flex items-center gap-1 text-sm">
            <span class="text-gray-600 dark:text-gray-400">{{ __('costs.stats.per_month') }}</span>
        </div>
    </div>

</div>