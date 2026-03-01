<x-app-layout>
    <div class="space-y-6">

        @include('timesheets.index._header')

        @include('timesheets.index._stats-cards')

        @include('timesheets.index._filters')

        @if($timesheets->count() > 0)
            @include('timesheets.index._table')
        @else
            @include('timesheets.index._empty-state')
        @endif

    </div>
</x-app-layout>
