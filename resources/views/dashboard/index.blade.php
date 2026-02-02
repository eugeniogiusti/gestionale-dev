<x-app-layout>
    <div class="space-y-6">

        {{-- Header --}}
        <div class="flex items-center justify-between mb-6">
            <div class="flex items-center gap-4">
                <div class="p-3 bg-indigo-100 dark:bg-indigo-900/20 rounded-lg">
                    <svg class="w-8 h-8 text-indigo-600 dark:text-indigo-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
                    </svg>
                </div>
                <div>
                    <h1 class="text-2xl font-bold text-gray-900 dark:text-white">
                        {{ __('dashboard.title') }}
                    </h1>
                    <p class="text-sm text-gray-500 dark:text-gray-400">
                        {{ __('dashboard.welcome_message') }}
                    </p>
                </div>
            </div>
            <p class="text-sm text-gray-500 dark:text-gray-400">
                {{ now()->translatedFormat('l, d F Y') }}
            </p>
        </div>

        {{-- Stats Cards --}}
        @include('dashboard._stats-cards')

        {{-- Annual Trend Chart + Welcome Card --}}
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
            {{-- Annual Trend Chart --}}
            <div class="lg:col-span-2">
                @include('dashboard._chart')
            </div>

            {{-- Welcome Card --}}
            <div class="lg:col-span-1">
                @include('dashboard._welcome-card')
            </div>
        </div>

        {{-- Quick Lists --}}
        @include('dashboard._lists')

    </div>
</x-app-layout>
