<x-app-layout>
    <div class="space-y-6">
        
        @include('meetings.index._header')
        
        {{-- Stats Cards --}}
        @include('meetings.index._stats-cards')
        
        @include('meetings.index._filters')
        
        @if($meetings->count() > 0)
            @include('meetings.index._table')
        @else
            @include('meetings.index._empty-state')
        @endif

    </div>
</x-app-layout>