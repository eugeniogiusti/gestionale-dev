{{-- Task Title Cell --}}
<td class="px-6 py-4">
    <div class="font-medium text-gray-900 dark:text-white">
        {{ $task->title }}
    </div>
    @if($task->description)
        <div class="text-sm text-gray-500 dark:text-gray-400 truncate max-w-xs mt-1">
            {{ Str::limit($task->description, 80) }}
        </div>
    @endif
</td>