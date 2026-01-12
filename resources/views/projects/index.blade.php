<x-app-layout>
    <div class="space-y-6">
        
        @include('projects.index._header')

        @include('projects.index._filters')

        @if($projects->count() > 0)
            @include('projects.index._table')
        @else
            @include('projects.index._empty-state')
        @endif

    </div>
</x-app-layout>