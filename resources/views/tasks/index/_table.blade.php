<div class="bg-white dark:bg-gray-800 rounded-lg shadow-sm overflow-hidden">
    <div class="overflow-x-auto">
        <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700">
            <thead class="bg-gray-50 dark:bg-gray-900">
                <tr>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider">
                        {{ __('tasks.project') }}
                    </th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider">
                        {{ __('tasks.task_title') }}
                    </th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider">
                        {{ __('tasks.type') }}
                    </th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider">
                        {{ __('tasks.status') }}
                    </th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray500 dark:text-gray-400 uppercase tracking-wider">
                        {{ __('tasks.priority') }}
                    </th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider">
                        {{ __('tasks.due_date') }}
                    </th>
                    <th class="px-6 py-3 text-right text-xs font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider">
                        {{ __('ui.actions') }}
                    </th>
                </tr>
            </thead>
            <tbody class="bg-white dark:bg-gray-800 divide-y divide-gray-200 dark:divide-gray-700">
                @foreach($tasks as $task)
                    <tr class="hover:bg-gray-50 dark:hover:bg-gray-700 transition">
                        
                        {{-- Project --}}
                        <td class="px-6 py-4 whitespace-nowrap">
                            <div class="font-medium text-gray-900 dark:text-white">
                                <a href="{{ route('projects.show', $task->project) }}" 
                                   class="text-emerald-600 hover:text-emerald-800 dark:text-emerald-400 hover:underline">
                                    {{ $task->project->name }}
                                </a>
                            </div>
                        </td>

                        {{-- Task Title --}}
                        <td class="px-6 py-4">
                            <div class="font-medium text-gray-900 dark:text-white">
                                {{ $task->title }}
                            </div>
                            @if($task->description)
                                <div class="text-sm text-gray-500 dark:text-gray-400 truncate max-w-xs mt-1">
                                    {{ Str::limit($task->description, 80) }}
                                </div>
                            @endif
                        </td>

                        {{-- Type --}}
                        <td class="px-6 py-4 whitespace-nowrap">
                            <x-tasks.type-badge :type="$task->type" />
                        </td>

                        {{-- Status --}}
                        <td class="px-6 py-4 whitespace-nowrap">
                            <x-tasks.status-badge :status="$task->status" />
                        </td>

                        {{-- Priority --}}
                        <td class="px-6 py-4 whitespace-nowrap">
                            <x-tasks.priority-badge :priority="$task->priority" />
                        </td>


                        {{-- Due Date --}}
                        <td class="px-6 py-4 whitespace-nowrap">
                            <x-tasks.due-date :date="$task->due_date" />
                        </td>

                        {{-- Actions --}}
                        <td class="px-6 py-4 text-right">
                            <div class="flex flex-col items-end gap-2">
                               

                                {{-- Details --}}
                                <a href="{{ route('projects.show', [$task->project, '#tasks']) }}" 
                                   class="inline-flex items-center px-3 py-1.5 bg-emerald-100 dark:bg-emerald-900/30 text-emerald-700 dark:text-emerald-300 rounded-lg text-xs font-medium hover:bg-emerald-200 dark:hover:bg-emerald-800/50 transition group">
                                    <svg class="w-3.5 h-3.5 mr-1.5 group-hover:scale-110 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                    </svg>
                                    <span>{{ __('tasks.view_project') }}</span>
                                </a>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    {{-- Pagination --}}
    <div class="px-6 py-4 border-t border-gray-200 dark:border-gray-700">
        {{ $tasks->links() }}
    </div>
</div>