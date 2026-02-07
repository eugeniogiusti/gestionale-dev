<x-app-layout>
    <div class="space-y-6">

        @include('trash.index._header')

        @include('trash.index._stats-cards')

        @if($clients->count() > 0 || $projects->count() > 0)
            @if($clients->count() > 0)
                @include('trash.index._clients-table')
            @endif

            @if($projects->count() > 0)
                @include('trash.index._projects-table')
            @endif
        @else
            @include('trash.index._empty-state')
        @endif

    </div>
</x-app-layout>
