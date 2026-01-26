{{-- Name Cell --}}
<td class="px-6 py-4 whitespace-nowrap">
    <div class="text-sm font-medium text-gray-900 dark:text-white">
        {{ $project->name }}
    </div>
    {{-- Project Type Badge --}}
    <div class="mt-1">
        <x-project-type-badge :type="$project->type" />
    </div>

    {{-- Due date (only if exists) --}}
    @if($project->due_date)
        <div class="mt-1">
            <x-project-due-date :date="$project->due_date" />
        </div>
    @endif
</td>