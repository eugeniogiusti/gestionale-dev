<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <div>
                <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                    {{ __('calendar.page_title') }}
                </h2>
                <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
                    {{ __('calendar.page_description') }}
                </p>
            </div>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            
            <div class="grid grid-cols-1 lg:grid-cols-4 gap-6">
                
                {{-- Sidebar: Filters + Legend --}}
                <div class="lg:col-span-1 space-y-6">
                    @include('calendar.partials._filters')
                    @include('calendar.partials._legend')
                </div>

                {{-- Calendar --}}
                <div class="lg:col-span-3">
                    @include('calendar.partials._calendar')
                </div>

            </div>

        </div>
    </div>
</x-app-layout>