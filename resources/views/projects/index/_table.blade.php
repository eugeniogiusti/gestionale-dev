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
                        </td>
                        
                                {{-- Client --}}
                                <td class="px-6 py-4 whitespace-nowrap">
                                    @if($project->client)
                                        <div class="text-sm font-medium text-gray-900 dark:text-white">
                                            {{ $project->client->name }}
                                        </div>
                                        @if($project->client->vat_number)
                                            <div class="text-xs text-gray-500 dark:text-gray-400 mt-1">
                                                {{ $project->client->vat_number }}
                                            </div>
                                        @endif
                                    @else
                                        <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-gray-100 text-gray-800 dark:bg-gray-700 dark:text-gray-300">
                                            {{ __('projects.internal_project') }}
                                        </span>
                                    @endif
                                </td>

                        {{-- Status --}}
                        <td class="px-6 py-4 whitespace-nowrap">
                            @php
                                $statusColors = [
                                    'draft' => 'bg-gray-100 text-gray-800 dark:bg-gray-700 dark:text-gray-300',
                                    'in_progress' => 'bg-blue-100 text-blue-800 dark:bg-blue-900 dark:text-blue-300',
                                    'completed' => 'bg-green-100 text-green-800 dark:bg-green-900 dark:text-green-300',
                                    'archived' => 'bg-gray-100 text-gray-600 dark:bg-gray-800 dark:text-gray-400',
                                ];
                            @endphp
                            <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium {{ $statusColors[$project->status] ?? '' }}">
                                {{ __('projects.status_' . $project->status) }}
                            </span>
                        </td>

                        {{-- Priority --}}
                        <td class="px-6 py-4 whitespace-nowrap">
                            @if($project->priority)
                                @php
                                    $priorityColors = [
                                        'low' => 'bg-gray-100 text-gray-600 dark:bg-gray-700 dark:text-gray-400',
                                        'medium' => 'bg-yellow-100 text-yellow-800 dark:bg-yellow-900 dark:text-yellow-300',
                                        'high' => 'bg-red-100 text-red-800 dark:bg-red-900 dark:text-red-300',
                                    ];
                                @endphp
                                <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium {{ $priorityColors[$project->priority] ?? '' }}">
                                    {{ __('projects.priority_' . $project->priority) }}
                                </span>
                            @else
                                <span class="text-gray-400 dark:text-gray-600">-</span>
                            @endif
                        </td>

                        {{-- Quick Links --}}
                        <td class="px-6 py-4 whitespace-nowrap">
                            <div class="flex space-x-2">
                                @if($project->repo_url)
                                    <a href="{{ $project->repo_url }}" target="_blank" 
                                       class="text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white"
                                       title="{{ __('projects.open_repo') }}">
                                        🔗
                                    </a>
                                @endif
                                @if($project->staging_url)
                                    <a href="{{ $project->staging_url }}" target="_blank" 
                                       class="text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white"
                                       title="{{ __('projects.open_staging') }}">
                                        🌐
                                    </a>
                                @endif
                                @if($project->production_url)
                                    <a href="{{ $project->production_url }}" target="_blank" 
                                       class="text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white"
                                       title="{{ __('projects.open_production') }}">
                                        ✅
                                    </a>
                                @endif
                                @if($project->figma_url)
                                    <a href="{{ $project->figma_url }}" target="_blank" 
                                       class="text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white"
                                       title="{{ __('projects.open_figma') }}">
                                        📐
                                    </a>
                                @endif
                                @if($project->docs_url)
                                    <a href="{{ $project->docs_url }}" target="_blank" 
                                       class="text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white"
                                       title="{{ __('projects.open_docs') }}">
                                        📚
                                    </a>
                                @endif
                                @if(!$project->repo_url && !$project->staging_url && !$project->production_url && !$project->figma_url && !$project->docs_url)
                                    <span class="text-gray-400 dark:text-gray-600">-</span>
                                @endif
                            </div>
                        </td>

                        {{-- Created At --}}
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500 dark:text-gray-400">
                            {{ $project->created_at->format('d/m/Y') }}
                        </td>

                        {{-- Actions --}}
                        <td class="px-6 py-4 text-right">
                            <div class="flex flex-col items-end gap-2">
                                {{-- Edit --}}
                                <x-action-button :href="route('projects.edit', $project)" variant="primary" :title="__('projects.edit')">
                                    <svg class="w-4 h-4 mr-1.5 group-hover:scale-110 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                    </svg>
                                    <span class="text-xs font-medium">{{ __('projects.edit') }}</span>
                                </x-action-button>

                                {{-- Details --}}
                                <x-action-button :href="route('projects.show', $project)" variant="info" :title="__('projects.details')">
                                    <svg class="w-4 h-4 mr-1.5 group-hover:scale-110 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                    </svg>
                                    <span class="text-xs font-medium">{{ __('projects.details') }}</span>
                                </x-action-button>

                                {{-- Delete --}}
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