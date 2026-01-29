<x-app-layout>
    <div class="space-y-6">

        {{-- Header --}}
        <div class="flex items-center justify-between">
            <div>
                <h1 class="text-2xl font-bold text-gray-900 dark:text-white">
                    {{ __('dashboard.title') }}
                </h1>
                <p class="text-sm text-gray-500 dark:text-gray-400">
                    {{ __('dashboard.welcome_message') }}
                </p>
            </div>
            <p class="text-sm text-gray-500 dark:text-gray-400">
                {{ now()->translatedFormat('l, d F Y') }}
            </p>
        </div>

        {{-- Stats Cards --}}
        @include('dashboard._stats-cards')

        {{-- Annual Trend Chart --}}
        @include('dashboard._chart')

        {{-- Quick Lists --}}
        @include('dashboard._lists')

    </div>
</x-app-layout>
