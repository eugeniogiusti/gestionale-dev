{{-- Labels Cell --}}
<td class="px-4 py-4">
    <div class="flex flex-wrap gap-1">
        @forelse($document->labels as $label)
            <x-documents.label-badge :label="$label" />
        @empty
            <x-not-set-badge />
        @endforelse
    </div>
</td>
