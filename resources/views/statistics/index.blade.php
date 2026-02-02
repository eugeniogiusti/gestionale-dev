<x-app-layout>
    <div class="space-y-6">

        {{-- Header --}}
        <div class="flex items-center justify-between mb-6">
            <div class="flex items-center gap-4">
                <div class="p-3 bg-purple-100 dark:bg-purple-900/20 rounded-lg">
                    <svg class="w-8 h-8 text-purple-600 dark:text-purple-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z" />
                    </svg>
                </div>
                <div>
                    <h1 class="text-2xl font-bold text-gray-900 dark:text-white">
                        {{ __('statistics.title') }}
                    </h1>
                    <p class="text-sm text-gray-500 dark:text-gray-400">
                        {{ __('statistics.subtitle') }}
                    </p>
                </div>
            </div>
        </div>

        {{-- Filters --}}
        @include('statistics._filters')

        {{-- Summary Cards --}}
        @include('statistics._summary')

        {{-- Chart (solo vista anno) --}}
        @if($stats['chart'])
            @include('statistics._chart')
        @endif

        {{-- Monthly Table (solo vista anno) --}}
        @if($stats['monthly'])
            @include('statistics._monthly-table')
        @endif

    </div>
</x-app-layout>
