{{-- Stats Cards Orchestrator --}}
<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-6">
    @include('projects.index.stats-cards._total')
    @include('projects.index.stats-cards._in-progress')
    @include('projects.index.stats-cards._completed')
    @include('projects.index.stats-cards._archived')
</div>