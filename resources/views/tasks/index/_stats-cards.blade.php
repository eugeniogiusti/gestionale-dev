{{-- Stats Cards Orchestrator --}}
<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-6">
    @include('tasks.index.stats-cards._todo')
    @include('tasks.index.stats-cards._in-progress')
    @include('tasks.index.stats-cards._blocked')
    @include('tasks.index.stats-cards._bugs-open')
</div>