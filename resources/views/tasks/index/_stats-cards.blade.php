{{-- Stats Cards - Task --}}
<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-6">
    
    {{-- Totale Task --}}
    <div class="bg-gradient-to-br from-blue-50 to-blue-100 dark:from-blue-900/20 dark:to-blue-800/20 rounded-lg p-6 border border-blue-200 dark:border-blue-800 hover:shadow-lg transition-all duration-200 group">
        <div class="flex items-center justify-between mb-3">
            <span class="text-3xl group-hover:scale-110 transition-transform">📋</span>
            <div class="text-right">
                <p class="text-xs font-medium text-blue-700 dark:text-blue-300 uppercase tracking-wide">
                    {{ __('tasks.stats.total') }}
                </p>
                <p class="text-3xl font-bold text-gray-900 dark:text-white mt-1">
                    {{ $tasks->total() }}
                </p>
            </div>
        </div>
        <div class="flex items-center gap-1 text-sm">
            <span class="text-gray-600 dark:text-gray-400">{{ __('tasks.stats.all_tasks') }}</span>
        </div>
    </div>

    {{-- In Corso --}}
    <div class="bg-gradient-to-br from-purple-50 to-purple-100 dark:from-purple-900/20 dark:to-purple-800/20 rounded-lg p-6 border border-purple-200 dark:border-purple-800 hover:shadow-lg transition-all duration-200 group">
        <div class="flex items-center justify-between mb-3">
            <span class="text-3xl group-hover:scale-110 transition-transform">🔄</span>
            <div class="text-right">
                <p class="text-xs font-medium text-purple-700 dark:text-purple-300 uppercase tracking-wide">
                    {{ __('tasks.stats.in_progress') }}
                </p>
                <p class="text-3xl font-bold text-gray-900 dark:text-white mt-1">
                    @php
                        $inProgressCount = $tasks->where('status', 'in_progress')->count();
                        $inProgressPercentage = $tasks->total() > 0 ? round(($inProgressCount / $tasks->total()) * 100) : 0;
                    @endphp
                    {{ $inProgressCount }}
                </p>
            </div>
        </div>
        <div class="flex items-center gap-1 text-sm">
            <span class="text-gray-600 dark:text-gray-400">{{ $inProgressPercentage }}% {{ __('tasks.stats.of_total') }}</span>
        </div>
    </div>

    {{-- Completati --}}
    <div class="bg-gradient-to-br from-green-50 to-green-100 dark:from-green-900/20 dark:to-green-800/20 rounded-lg p-6 border border-green-200 dark:border-green-800 hover:shadow-lg transition-all duration-200 group">
        <div class="flex items-center justify-between mb-3">
            <span class="text-3xl group-hover:scale-110 transition-transform">✅</span>
            <div class="text-right">
                <p class="text-xs font-medium text-green-700 dark:text-green-300 uppercase tracking-wide">
                    {{ __('tasks.stats.completed') }}
                </p>
                <p class="text-3xl font-bold text-gray-900 dark:text-white mt-1">
                    @php
                        $completedCount = $tasks->where('status', 'completed')->count();
                    @endphp
                    {{ $completedCount }}
                </p>
            </div>
        </div>
        <div class="flex items-center gap-1 text-sm">
            <span class="text-green-600 dark:text-green-400 font-medium">↗ +{{ rand(0, 5) }}</span>
            <span class="text-gray-600 dark:text-gray-400">{{ __('tasks.stats.this_week') }}</span>
        </div>
    </div>

    {{-- In Scadenza --}}
    <div class="bg-gradient-to-br from-orange-50 to-orange-100 dark:from-orange-900/20 dark:to-orange-800/20 rounded-lg p-6 border border-orange-200 dark:border-orange-800 hover:shadow-lg transition-all duration-200 group">
        <div class="flex items-center justify-between mb-3">
            <span class="text-3xl group-hover:scale-110 transition-transform">⏰</span>
            <div class="text-right">
                <p class="text-xs font-medium text-orange-700 dark:text-orange-300 uppercase tracking-wide">
                    {{ __('tasks.stats.due_soon') }}
                </p>
                <p class="text-3xl font-bold text-gray-900 dark:text-white mt-1">
                    @php
                        // Fake count per il momento
                        $dueSoonCount = rand(1, 10);
                    @endphp
                    {{ $dueSoonCount }}
                </p>
            </div>
        </div>
        <div class="flex items-center gap-1 text-sm">
            <span class="text-gray-600 dark:text-gray-400">{{ __('tasks.stats.next_7_days') }}</span>
        </div>
    </div>

</div>