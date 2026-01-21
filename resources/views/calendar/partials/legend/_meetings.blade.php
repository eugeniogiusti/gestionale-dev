<div>
    <h4 class="text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
        {{ __('calendar.legend_meetings') }}
    </h4>
    <div class="space-y-1">
        <div class="flex items-center">
            <div class="w-3 h-3 rounded-full bg-[#8b5cf6] mr-2"></div>
            <span class="text-xs text-gray-600 dark:text-gray-400">{{ __('calendar.meeting_scheduled') }}</span>
        </div>
        <div class="flex items-center">
            <div class="w-3 h-3 rounded-full bg-[#10b981] mr-2"></div>
            <span class="text-xs text-gray-600 dark:text-gray-400">{{ __('calendar.meeting_completed') }}</span>
        </div>
        <div class="flex items-center">
            <div class="w-3 h-3 rounded-full bg-[#ef4444] mr-2"></div>
            <span class="text-xs text-gray-600 dark:text-gray-400">{{ __('calendar.meeting_cancelled') }}</span>
        </div>
    </div>
</div>