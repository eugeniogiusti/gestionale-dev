<x-app-layout>
    <div class="space-y-6">
        
        @include('tasks.index._header')
        
        {{-- Stats Cards --}}
        @include('tasks.index._stats-cards')
        
        @include('tasks.index._filters')
        
        @if($tasks->count() > 0)
            @include('tasks.index._table')
        @else
            @include('tasks.index._empty-state')
        @endif

    </div>
</x-app-layout>