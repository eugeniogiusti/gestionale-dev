<x-app-layout>
    <div class="space-y-6">

        {{-- Header --}}
        <div class="flex items-center justify-between">
            <div>
                <h1 class="text-2xl font-bold text-gray-900 dark:text-white">
                    {{ __('statistics.title') }}
                </h1>
                <p class="text-sm text-gray-500 dark:text-gray-400">
                    {{ __('statistics.subtitle') }}
                </p>
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
