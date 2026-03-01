{{-- Filters --}}
<div class="bg-white dark:bg-gray-800 rounded-lg shadow-sm p-6">
    <form method="GET" action="{{ route('timesheets.index') }}" class="space-y-4">
        <div class="grid grid-cols-1 md:grid-cols-5 gap-4">
            @include('timesheets.index.filters._search')
            @include('timesheets.index.filters._month')
            @include('timesheets.index.filters._year')
            @include('timesheets.index.filters._actions')
        </div>
    </form>
</div>
