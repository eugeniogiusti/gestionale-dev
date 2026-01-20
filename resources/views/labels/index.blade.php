<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                {{ __('labels.title') }}
            </h2>
            <button @click="$dispatch('open-label-modal')"
                    class="px-4 py-2 bg-emerald-600 text-white rounded-lg hover:bg-emerald-700 transition">
                {{ __('labels.create_label') }}
            </button>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            
            @if($labels->count() > 0)
                @include('labels.partials._table')
            @else
                @include('labels.partials._empty-state')
            @endif

            {{-- Modal --}}
            @include('labels.partials._modal-form')

        </div>
    </div>
</x-app-layout>