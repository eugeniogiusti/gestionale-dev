<x-app-layout>
    <div class="space-y-6">
        
        @include('payments.index._header')
        
        {{-- Stats Cards --}}
        @include('payments.index._stats-cards')
        
        @include('payments.index._filters')
        
        @if($payments->count() > 0)
            @include('payments.index._table')
        @else
            @include('payments.index._empty-state')
        @endif

    </div>
</x-app-layout>