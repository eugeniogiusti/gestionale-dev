{{-- Name Cell --}}
<td class="px-6 py-4 whitespace-nowrap">
    <a href="{{ route('projects.show', $project) }}"
       class="text-sm font-medium text-gray-900 dark:text-white hover:text-emerald-600 dark:hover:text-emerald-400 transition-colors">
        {{ $project->name }}
    </a>
    {{-- Project Type Badge --}}
    <div class="mt-1">
        <x-projects.type-badge :type="$project->type" />
    </div>

    {{-- Due date (only if exists) --}}
    @if($project->due_date)
        <div class="mt-1">
            <x-projects.due-date :date="$project->due_date" />
        </div>
    @endif
</td>