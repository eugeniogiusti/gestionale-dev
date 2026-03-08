{{-- Commit Activity Heatmap (52 weeks × 7 days) --}}
<div x-show="activity.length > 0"
     class="bg-gray-50 dark:bg-gray-700/30 rounded-xl border border-gray-200 dark:border-gray-700 p-5">

    <h4 class="text-sm font-semibold text-gray-700 dark:text-gray-300 mb-4">
        {{ __('projects.commit_activity') }}
    </h4>

    {{-- Month labels --}}
    <div class="flex gap-1 mb-1 ml-6">
        <template x-for="month in heatmapMonths" :key="month.label + month.col">
            <div class="text-xs text-gray-400 dark:text-gray-500 overflow-hidden whitespace-nowrap"
                 :style="`width: ${month.weeks * 14}px`"
                 x-text="month.label">
            </div>
        </template>
    </div>

    <div class="flex gap-1">
        {{-- Day-of-week labels --}}
        <div class="flex flex-col gap-1 mr-1 pt-0.5">
            <div class="h-3 leading-3"></div>
            <div class="h-3 text-xs text-gray-400 dark:text-gray-500 leading-3">Mo</div>
            <div class="h-3 leading-3"></div>
            <div class="h-3 text-xs text-gray-400 dark:text-gray-500 leading-3">We</div>
            <div class="h-3 leading-3"></div>
            <div class="h-3 text-xs text-gray-400 dark:text-gray-500 leading-3">Fr</div>
            <div class="h-3 leading-3"></div>
        </div>

        {{-- Grid: 52 columns (weeks) x 7 rows (days Sun→Sat) --}}
        <div class="flex gap-1">
            <template x-for="(week, wi) in activity" :key="wi">
                <div class="flex flex-col gap-1">
                    <template x-for="(count, di) in week.days" :key="di">
                        <div class="w-3 h-3 rounded-sm cursor-default transition-opacity hover:opacity-70"
                             :class="heatmapColor(count)"
                             :title="heatmapTitle(week.week, di, count)">
                        </div>
                    </template>
                </div>
            </template>
        </div>
    </div>

    {{-- Legend --}}
    <div class="flex items-center gap-1.5 mt-3 justify-end text-xs text-gray-400 dark:text-gray-500">
        <span>{{ __('projects.less') }}</span>
        <div class="w-3 h-3 rounded-sm bg-gray-100 dark:bg-gray-700"></div>
        <div class="w-3 h-3 rounded-sm bg-emerald-200 dark:bg-emerald-900"></div>
        <div class="w-3 h-3 rounded-sm bg-emerald-400 dark:bg-emerald-700"></div>
        <div class="w-3 h-3 rounded-sm bg-emerald-600 dark:bg-emerald-500"></div>
        <span>{{ __('projects.more') }}</span>
    </div>
</div>
