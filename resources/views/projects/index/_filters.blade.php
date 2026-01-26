{{-- Filters Orchestrator --}}
<div class="bg-white dark:bg-gray-800 rounded-lg shadow-sm p-6">
    <form method="GET" action="{{ route('projects.index') }}" class="space-y-4">
        <div class="grid grid-cols-1 md:grid-cols-4 gap-4">
            @include('projects.index.filters._search')
            @include('projects.index.filters._status')
            @include('projects.index.filters._priority')
            @include('projects.index.filters._actions')
        </div>
    </form>
</div>