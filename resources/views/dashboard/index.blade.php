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
