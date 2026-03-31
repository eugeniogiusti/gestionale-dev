{{-- Stats Cards Orchestrator --}}
<div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-6">
    @include('costs.index.stats-cards._total-all-time')
    @include('costs.index.stats-cards._this-month')
    @include('costs.index.stats-cards._this-year')
</div>