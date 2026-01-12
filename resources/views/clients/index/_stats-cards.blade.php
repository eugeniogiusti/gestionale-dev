{{-- Stats Cards - Clienti --}}
<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-6">
    
    {{-- Totale Clienti --}}
    <div class="bg-gradient-to-br from-indigo-50 to-indigo-100 dark:from-indigo-900/20 dark:to-indigo-800/20 rounded-lg p-6 border border-indigo-200 dark:border-indigo-800 hover:shadow-lg transition-all duration-200 group">
        <div class="flex items-center justify-between mb-3">
            <span class="text-3xl group-hover:scale-110 transition-transform">👥</span>
            <div class="text-right">
                <p class="text-xs font-medium text-indigo-700 dark:text-indigo-300 uppercase tracking-wide">
                    {{ __('clients.stats.total') }}
                </p>
                <p class="text-3xl font-bold text-gray-900 dark:text-white mt-1">
                    {{ $stats['total'] }}
                </p>
            </div>
        </div>
        <div class="flex items-center gap-1 text-sm">
            <span class="text-green-600 dark:text-green-400 font-medium">↗ +{{ $stats['new_this_month'] }}</span>
            <span class="text-gray-600 dark:text-gray-400">{{ __('clients.stats.this_month') }}</span>
        </div>
    </div>

    {{-- Lead --}}
    <div class="bg-gradient-to-br from-yellow-50 to-yellow-100 dark:from-yellow-900/20 dark:to-yellow-800/20 rounded-lg p-6 border border-yellow-200 dark:border-yellow-800 hover:shadow-lg transition-all duration-200 group">
        <div class="flex items-center justify-between mb-3">
            <span class="text-3xl group-hover:scale-110 transition-transform">✨</span>
            <div class="text-right">
                <p class="text-xs font-medium text-yellow-700 dark:text-yellow-300 uppercase tracking-wide">
                    {{ __('clients.stats.lead') }}
                </p>
                <p class="text-3xl font-bold text-gray-900 dark:text-white mt-1">
                    {{ $stats['lead'] }}
                </p>
            </div>
        </div>
        <div class="flex items-center gap-1 text-sm">
            <span class="text-gray-600 dark:text-gray-400">{{ $stats['lead_percentage'] }}% {{ __('clients.stats.of_total') }}</span>
        </div>
    </div>

    {{-- Attivi --}}
    <div class="bg-gradient-to-br from-green-50 to-green-100 dark:from-green-900/20 dark:to-green-800/20 rounded-lg p-6 border border-green-200 dark:border-green-800 hover:shadow-lg transition-all duration-200 group">
        <div class="flex items-center justify-between mb-3">
            <span class="text-3xl group-hover:scale-110 transition-transform">✅</span>
            <div class="text-right">
                <p class="text-xs font-medium text-green-700 dark:text-green-300 uppercase tracking-wide">
                    {{ __('clients.stats.active') }}
                </p>
                <p class="text-3xl font-bold text-gray-900 dark:text-white mt-1">
                    {{ $stats['active'] }}
                </p>
            </div>
        </div>
        <div class="flex items-center gap-1 text-sm">
            <span class="text-green-600 dark:text-green-400 font-medium">↗ +{{ $stats['converted_this_month'] }}</span>
            <span class="text-gray-600 dark:text-gray-400">{{ __('clients.stats.converted') }}</span>
        </div>
    </div>

    {{-- Archiviati --}}
    <div class="bg-gradient-to-br from-gray-50 to-gray-100 dark:from-gray-800/50 dark:to-gray-700/50 rounded-lg p-6 border border-gray-200 dark:border-gray-700 hover:shadow-lg transition-all duration-200 group">
        <div class="flex items-center justify-between mb-3">
            <span class="text-3xl group-hover:scale-110 transition-transform">📦</span>
            <div class="text-right">
                <p class="text-xs font-medium text-gray-700 dark:text-gray-300 uppercase tracking-wide">
                    {{ __('clients.stats.archived') }}
                </p>
                <p class="text-3xl font-bold text-gray-900 dark:text-white mt-1">
                    {{ $stats['archived'] }}
                </p>
            </div>
        </div>
        <div class="flex items-center gap-1 text-sm">
            <span class="text-gray-600 dark:text-gray-400">{{ $stats['archived_percentage'] }}% {{ __('clients.stats.of_total') }}</span>
        </div>
    </div>

</div>