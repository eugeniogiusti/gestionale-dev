<x-app-layout>
    <div class="space-y-6">

        @include('documents.index._header')
            
            {{-- Stats --}}
            @include('documents.index._stats-cards')

            {{-- Filters --}}
            @include('documents.index._filters')

            {{-- Table / Empty State --}}
            @if($documents->count() > 0)
                @include('documents.index._table')
            @else
                @include('documents.index._empty-state')
            @endif

        </div>
    </div>
</x-app-layout>
