{{-- Project Cell --}}
<td class="px-6 py-4 whitespace-nowrap">
    <a href="{{ route('projects.show', [$meeting->project, 'tab' => 'meetings']) }}"
       class="text-sm font-medium text-gray-900 dark:text-white hover:text-emerald-600 dark:hover:text-emerald-400">
        {{ $meeting->project->name }}
    </a>
    @if($meeting->project->client)
        <div class="text-xs text-gray-500 dark:text-gray-400 mt-1">
            {{ $meeting->project->client->name }}
        </div>
    @else
        <div class="mt-1">
            <span class="inline-flex items-center px-2 py-0.5 rounded-full text-xs font-medium bg-gray-100 text-gray-600 dark:bg-gray-700 dark:text-gray-400">
                {{ __('projects.internal_project') }}
            </span>
        </div>
    @endif
</td>