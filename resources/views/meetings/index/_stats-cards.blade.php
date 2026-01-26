{{-- Stats Cards Orchestrator --}}
<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-6">
    @include('meetings.index.stats-cards._upcoming')
    @include('meetings.index.stats-cards._today')
    @include('meetings.index.stats-cards._this-week')
    @include('meetings.index.stats-cards._completed')
</div>