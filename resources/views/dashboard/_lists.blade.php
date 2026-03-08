{{-- Quick Lists --}}
<div class="space-y-6">
    {{-- Row 1: Tasks + Meetings --}}
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
        @include('dashboard.lists._tasks-due-soon')
        @include('dashboard.lists._upcoming-meetings')
    </div>

    {{-- Row 2: Recent Payments + Recent Costs --}}
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
        @include('dashboard.lists._recent-payments')
        @include('dashboard.lists._recent-costs')
    </div>

    {{-- Row 3: Overdue Payments (full width) --}}
    @include('dashboard.lists._overdue-payments')
</div>
