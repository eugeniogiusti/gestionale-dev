{{-- Title Cell --}}
<td class="px-6 py-4">
    <div class="font-medium text-gray-900 dark:text-white">
        {{ $meeting->title }}
    </div>
    @if($meeting->description)
        <div class="text-sm text-gray-500 dark:text-gray-400 truncate max-w-xs mt-1">
            {{ Str::limit($meeting->description, 60) }}
        </div>
    @endif
</td>