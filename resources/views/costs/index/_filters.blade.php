{{-- Filters Orchestrator --}}
<div class="bg-white dark:bg-gray-800 rounded-lg shadow-sm p-6">
    <form method="GET" action="{{ route('costs.index') }}" class="space-y-4">
        <div class="grid grid-cols-1 md:grid-cols-6 gap-4">
            @include('costs.index.filters._search')
            @include('costs.index.filters._type')
            @include('costs.index.filters._recurring')
            @include('costs.index.filters._date-range')
            @include('costs.index.filters._actions')
        </div>
    </form>
</div>
