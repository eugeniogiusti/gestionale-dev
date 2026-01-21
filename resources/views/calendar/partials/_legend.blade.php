<div class="bg-white dark:bg-gray-800 rounded-lg shadow-sm p-6">
    <h3 class="text-lg font-semibold text-gray-900 dark:text-white mb-4">
        {{ __('calendar.legend') }}
    </h3>

    <div class="space-y-4">
        @include('calendar.partials.legend._projects')
        @include('calendar.partials.legend._meetings')
        @include('calendar.partials.legend._tasks')
    </div>
</div>