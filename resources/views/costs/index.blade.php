<x-app-layout>
    <div class="space-y-6">
        
        @include('costs.index._header')
        
        {{-- Stats Cards --}}
        @include('costs.index._stats-cards')
        
        @include('costs.index._filters')
        
        @if($costs->count() > 0)
            @include('costs.index._table')
        @else
            @include('costs.index._empty-state')
        @endif

    </div>
</x-app-layout>