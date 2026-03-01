{{-- Stats Cards --}}
<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-6">
    @include('timesheets.index.stats-cards._hours-this-month')
    @include('timesheets.index.stats-cards._earnings-this-month')
    @include('timesheets.index.stats-cards._hours-this-year')
    @include('timesheets.index.stats-cards._earnings-this-year')
</div>
