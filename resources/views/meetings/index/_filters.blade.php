{{-- Filters Orchestrator --}}
<div class="bg-white dark:bg-gray-800 rounded-lg shadow-sm p-6">
    <form method="GET" action="{{ route('meetings.index') }}" class="space-y-4">
        <div class="grid grid-cols-1 md:grid-cols-5 gap-4">
            @include('meetings.index.filters._search')
            @include('meetings.index.filters._status')
            @include('meetings.index.filters._date-from')
            @include('meetings.index.filters._date-to')
            @include('meetings.index.filters._actions')
        </div>
    </form>
</div>