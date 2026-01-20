<div class="bg-white dark:bg-gray-800 rounded-lg shadow-sm overflow-hidden">
    <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700">
        <thead class="bg-gray-50 dark:bg-gray-900">
            <tr>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider">
                    {{ __('labels.name') }}
                </th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider">
                    {{ __('labels.color') }}
                </th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider">
                    {{ __('labels.documents_count') }}
                </th>
                <th class="px-6 py-3 text-right text-xs font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider">
                    {{ __('ui.actions') }}
                </th>
            </tr>
        </thead>
        <tbody class="bg-white dark:bg-gray-800 divide-y divide-gray-200 dark:divide-gray-700">
            @foreach($labels as $label)
                <tr class="hover:bg-gray-50 dark:hover:bg-gray-700 transition">
                    
                    {{-- Name --}}
                    <td class="px-6 py-4 font-medium text-gray-900 dark:text-white">
                        {{ $label->name }}
                    </td>

                    {{-- Color --}}
                    <td class="px-6 py-4">
                        <x-documents.label-badge :label="$label" />
                    </td>

                    {{-- Documents Count --}}
                    <td class="px-6 py-4 text-sm text-gray-500 dark:text-gray-400">
                        {{ $label->documents->count() }}
                    </td>

                    {{-- Actions --}}
                    <td class="px-6 py-4 text-right">
                        <div class="flex justify-end gap-2">
                            
                            {{-- Edit --}}
                            <button @click="$dispatch('edit-label', {{ $label->id }})"
                                    class="text-blue-600 hover:text-blue-800 dark:text-blue-400"
                                    title="{{ __('ui.edit') }}">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                </svg>
                            </button>

                            {{-- Delete --}}
                            <form method="POST" action="{{ route('labels.destroy', $label) }}"
                                  onsubmit="return confirm('{{ __('labels.confirm_delete') }}')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" 
                                        class="text-red-600 hover:text-red-800 dark:text-red-400"
                                        title="{{ __('ui.delete') }}">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                    </svg>
                                </button>
                            </form>
                        </div>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>