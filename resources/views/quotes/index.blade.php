<x-app-layout>
    <div class="space-y-6">
        
        {{-- Header --}}
        @include('quotes.index._header')

        {{-- Stats --}}
        @include('quotes.index._stats-cards')

        {{-- Filters --}}
        @include('quotes.index._filters')

        {{-- Table / Empty State --}}
        @if($quotes->count() > 0)
            @include('quotes.index._table')
        @else
            @include('quotes.index._empty-state')
        @endif

    </div>
</x-app-layout>