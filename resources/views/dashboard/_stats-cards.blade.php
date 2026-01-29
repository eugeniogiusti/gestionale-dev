{{-- Stats Cards --}}
<div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-4 gap-6">
    @include('dashboard.stats-cards._profit')
    @include('dashboard.stats-cards._pending-payments')
    @include('dashboard.stats-cards._active-projects')
    @include('dashboard.stats-cards._open-tasks')
</div>
