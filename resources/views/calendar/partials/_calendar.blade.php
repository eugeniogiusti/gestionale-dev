<div class="bg-white dark:bg-gray-800 rounded-lg shadow-sm p-6">
    <div id="calendar" 
         x-data="window.calendar()"
         data-translations="{{ json_encode([
            'today' => __('calendar.today'),
            'month_view' => __('calendar.month_view'),
            'week_view' => __('calendar.week_view'),
            'day_view' => __('calendar.day_view'),
            'client' => __('calendar.client'),
            'project' => __('calendar.project'),
            'status' => __('calendar.status'),
            'priority' => __('calendar.priority'),
            'location' => __('calendar.location'),
            'overdue' => __('calendar.overdue'),
            'click_to_view' => __('calendar.click_to_view'),
         ]) }}">
    </div>
</div>