{{-- Project Cell --}}
<td class="px-6 py-4 whitespace-nowrap">
    <a href="{{ route('projects.show', [$document->project, '#documents']) }}" 
       class="text-emerald-600 hover:text-emerald-800 dark:text-emerald-400 hover:underline font-medium">
        {{ $document->project->name }}
    </a>
    @if($document->project->client)
        <div class="text-xs text-gray-500 dark:text-gray-400">
            {{ $document->project->client->name }}
        </div>
    @endif
</td>