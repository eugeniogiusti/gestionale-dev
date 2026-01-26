{{-- Uploaded At Cell --}}
<td class="px-6 py-4 whitespace-nowrap">
    <div class="text-sm text-gray-900 dark:text-white">
        {{ $document->uploaded_at->format('d/m/Y') }}
    </div>
    <div class="text-xs text-gray-500 dark:text-gray-400">
        {{ $document->file_size }}
    </div>
</td>