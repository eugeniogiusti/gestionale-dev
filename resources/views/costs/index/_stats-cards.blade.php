{{-- Stats Cards Orchestrator --}}
<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-6">
    @include('costs.index.stats-cards._total-all-time')
    @include('costs.index.stats-cards._this-month')
    @include('costs.index.stats-cards._this-year')
    @include('costs.index.stats-cards._recurring-monthly')
</div>