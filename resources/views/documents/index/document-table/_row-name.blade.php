{{-- Name Cell --}}
<td class="px-6 py-4">
    <div class="font-medium text-gray-900 dark:text-white">
        {{ $document->name }}
    </div>
    @if($document->notes)
        <div class="text-xs text-gray-500 dark:text-gray-400 truncate max-w-xs mt-1">
            {{ Str::limit($document->notes, 50) }}
        </div>
    @endif
</td>