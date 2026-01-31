{{-- Duration Cell --}}
<td class="px-6 py-4 whitespace-nowrap text-sm">
    @if($meeting->duration_minutes)
        <span class="text-gray-900 dark:text-white">{{ $meeting->duration_minutes }} min</span>
    @else
        <span class="inline-flex items-center px-2 py-0.5 rounded-full text-xs font-medium bg-gray-100 text-gray-600 dark:bg-gray-700 dark:text-gray-400">
            N/A
        </span>
    @endif
</td>
