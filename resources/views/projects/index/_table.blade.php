<div class="bg-white dark:bg-gray-800 rounded-lg shadow-sm overflow-hidden">
    <div class="overflow-x-auto">
        <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700">
            <thead class="bg-gray-50 dark:bg-gray-900">
                <tr>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider">
                        {{ __('projects.table.name') }}
                    </th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider">
                        {{ __('projects.table.client') }}
                    </th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider">
                        {{ __('projects.table.status') }}
                    </th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider">
                        {{ __('projects.table.priority') }}
                    </th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider">
                        {{ __('projects.table.links') }}
                    </th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider">
                        {{ __('projects.table.created_at') }}
                    </th>
                    <th class="px-6 py-3 text-right text-xs font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider">
                        {{ __('projects.table.actions') }}
                    </th>
                </tr>
            </thead>
            <tbody class="bg-white dark:bg-gray-800 divide-y divide-gray-200 dark:divide-gray-700">
                @foreach($projects as $project)
                    <tr class="hover:bg-gray-50 dark:hover:bg-gray-700 transition">
                        
                        {{-- Name --}}
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
                        
                                {{-- Client --}}
                            <td class="px-6 py-4 whitespace-nowrap">
                                <x-project-client-badge :client="$project->client" />
                            </td>

                            {{-- Status --}}
                            <td class="px-6 py-4 whitespace-nowrap">
                                <x-project-status-badge :status="$project->status" />
                            </td>

                            {{-- Priority --}}
                            <td class="px-6 py-4 whitespace-nowrap">
                                <x-project-priority-badge :priority="$project->priority" />
                            </td>

                        {{-- Quick Links --}}
                    <td class="px-6 py-4 whitespace-nowrap">
                        <x-project-links :project="$project" />
                    </td>

                        {{-- Created At --}}
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500 dark:text-gray-400">
                            {{ $project->created_at->format('d/m/Y') }}
                        </td>

{{-- Actions --}}
<td class="px-6 py-4 text-right">
    <div class="flex flex-col items-end gap-2">
        {{-- Edit - MODIFICA QUESTO --}}
        <x-action-button 
            type="button"
            variant="primary" 
            :title="__('projects.edit')"
            x-data
            @click="$dispatch('edit-project', {{ Js::from($project) }})"
        >
            <svg class="w-4 h-4 mr-1.5 group-hover:scale-110 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
            </svg>
            <span class="text-xs font-medium">{{ __('projects.edit') }}</span>
        </x-action-button>

        {{-- Details - RIMANE UGUALE --}}
        <x-action-button :href="route('projects.show', $project)" variant="info" :title="__('projects.details')">
            <svg class="w-4 h-4 mr-1.5 group-hover:scale-110 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
            </svg>
            <span class="text-xs font-medium">{{ __('projects.details') }}</span>
        </x-action-button>

        {{-- Delete - RIMANE UGUALE --}}
        <form action="{{ route('projects.destroy', $project) }}" 
              method="POST" 
              onsubmit="return confirm('{{ __('projects.confirm_delete') }}')">
            @csrf
            @method('DELETE')
            <x-action-button type="submit" variant="danger" :title="__('projects.delete')">
                <svg class="w-4 h-4 mr-1.5 group-hover:scale-110 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                </svg>
                <span class="text-xs font-medium">{{ __('projects.delete') }}</span>
            </x-action-button>
        </form>
    </div>
</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    {{-- Pagination --}}
    <div class="px-6 py-4 border-t border-gray-200 dark:border-gray-700">
        {{ $projects->links() }}
    </div>
</div>