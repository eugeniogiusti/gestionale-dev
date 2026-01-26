{{-- Labels Cell --}}
<td class="px-6 py-4">
    <div class="flex flex-wrap gap-1">
        @forelse($document->labels as $label)
            <x-documents.label-badge :label="$label" />
        @empty
            <span class="text-xs text-gray-400">—</span>
        @endforelse
    </div>
</td>