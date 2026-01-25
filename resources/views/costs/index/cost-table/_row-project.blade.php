{{-- Project Cell --}}
<td class="px-6 py-4 whitespace-nowrap">
    <a href="{{ route('projects.show', [$cost->project, '#costs']) }}" 
       class="text-emerald-600 hover:text-emerald-800 dark:text-emerald-400 hover:underline font-medium">
        {{ $cost->project->name }}
    </a>
    @if($cost->project->client)
        <div class="text-xs text-gray-500 dark:text-gray-400">
            {{ $cost->project->client->name }}
        </div>
    @endif
</td>