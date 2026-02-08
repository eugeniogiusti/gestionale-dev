<div class="bg-white dark:bg-gray-800 rounded-lg shadow-sm p-6">
    <form method="GET" action="{{ route('payments.index') }}" class="space-y-4">
        <div class="grid grid-cols-1 md:grid-cols-6 gap-4">
            @include('payments.index.filters._search')
            @include('payments.index.filters._status')
            @include('payments.index.filters._method')
            @include('payments.index.filters._date-range')
            @include('payments.index.filters._actions')
        </div>
    </form>
</div>
