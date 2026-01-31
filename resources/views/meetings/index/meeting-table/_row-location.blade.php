{{-- Location Cell --}}
<td class="px-6 py-4 whitespace-nowrap">
    @if($meeting->location || $meeting->meeting_url)
        @if($meeting->location)
            <div class="text-sm text-gray-900 dark:text-white">
                {{ $meeting->location }}
            </div>
        @endif
        @if($meeting->meeting_url)
            <a href="{{ $meeting->meeting_url }}" target="_blank"
               class="text-xs text-blue-600 hover:text-blue-800 dark:text-blue-400">
                {{ __('meetings.join_link') }}
            </a>
        @endif
    @else
        <span class="inline-flex items-center px-2 py-0.5 rounded-full text-xs font-medium bg-gray-100 text-gray-600 dark:bg-gray-700 dark:text-gray-400">
            N/A
        </span>
    @endif
</td>
