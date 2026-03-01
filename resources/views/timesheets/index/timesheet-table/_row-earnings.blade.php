{{-- Row: To collect --}}
<td class="px-6 py-4 whitespace-nowrap text-right">
    @if($timesheet->hourly_rate > 0)
        <span class="text-sm font-semibold text-emerald-600 dark:text-emerald-400">
            €{{ number_format($timesheet->totalEarnings(), 2, ',', '.') }}
        </span>
    @else
        <span class="text-sm text-amber-500" title="{{ __('timesheets.no_rate_warning') }}">—</span>
    @endif
</td>
