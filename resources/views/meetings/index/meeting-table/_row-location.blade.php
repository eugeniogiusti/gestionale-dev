{{-- Location Cell --}}
<td class="px-6 py-4 whitespace-nowrap">
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
</td>