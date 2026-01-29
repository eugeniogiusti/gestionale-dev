{{-- Quick Lists --}}
<div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
    @include('dashboard.lists._tasks-due-soon')
    @include('dashboard.lists._upcoming-meetings')
    @include('dashboard.lists._overdue-payments')
    @include('dashboard.lists._recent-payments')
</div>
