<x-app-layout>
    <div class="space-y-6" x-data="labelModal(@js($labels))">
        
        {{-- Header --}}
        @include('labels.partials._header')

        {{-- Table / Empty State --}}
        @if($labels->count() > 0)
            @include('labels.partials._table')
        @else
            @include('labels.partials._empty-state')
        @endif

        {{-- Modal --}}
        @include('labels.partials._modal-form')

    </div>
</x-app-layout>