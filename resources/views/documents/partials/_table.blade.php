{{-- Tabella riutilizzabile per show project --}}
<div class="overflow-x-auto">
    <table class="w-full">
        <thead class="bg-gray-50 dark:bg-gray-700">
            <tr>
                <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase">
                    {{ __('documents.name') }}
                </th>
                <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase">
                    {{ __('documents.labels') }}
                </th>
                <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase">
                    {{ __('documents.uploaded_at') }}
                </th>
                <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase">
                    {{ __('documents.size') }}
                </th>
                <th class="px-4 py-3 text-right text-xs font-medium text-gray-500 dark:text-gray-300 uppercase">
                    {{ __('ui.actions') }}
                </th>
            </tr>
        </thead>
        <tbody class="divide-y divide-gray-200 dark:divide-gray-700">
            @foreach($documents as $document)
                <tr class="hover:bg-gray-50 dark:hover:bg-gray-700 transition">
                    
                    {{-- Name & Notes --}}
                    <td class="px-4 py-4">
                        <div class="font-medium text-gray-900 dark:text-white">
                            {{ $document->name }}
                        </div>
                        @if($document->notes)
                            <div class="text-xs text-gray-500 dark:text-gray-400 truncate max-w-xs mt-1">
                                {{ Str::limit($document->notes, 50) }}
                            </div>
                        @endif
                    </td>

                    {{-- Labels --}}
                    <td class="px-4 py-4">
                        <div class="flex flex-wrap gap-1">
                            @forelse($document->labels as $label)
                                <x-documents.label-badge :label="$label" />
                            @empty
                                <span class="text-xs text-gray-400">—</span>
                            @endforelse
                        </div>
                    </td>

                    {{-- Uploaded At --}}
                    <td class="px-4 py-4 whitespace-nowrap">
                        <div class="text-sm text-gray-900 dark:text-white">
                            {{ $document->uploaded_at->format('d/m/Y') }}
                        </div>
                        <div class="text-xs text-gray-500 dark:text-gray-400">
                            {{ $document->uploaded_at->format('H:i') }}
                        </div>
                    </td>

                    {{-- File Size --}}
                    <td class="px-4 py-4 whitespace-nowrap">
                        <span class="text-sm text-gray-600 dark:text-gray-400">
                            {{ $document->file_size }}
                        </span>
                    </td>

                    {{-- Actions --}}
                    <td class="px-4 py-4 text-right">
                        <div class="flex justify-end gap-2">
                            
                            {{-- Preview --}}
                            <a href="{{ $document->getPreviewUrl() }}" 
                               target="_blank"
                               class="text-purple-600 hover:text-purple-800 dark:text-purple-400"
                               title="{{ __('documents.preview') }}">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                </svg>
                            </a>

                            {{-- Download --}}
                            <a href="{{ $document->getDownloadUrl() }}" 
                               class="text-green-600 hover:text-green-800 dark:text-green-400"
                               title="{{ __('documents.download') }}">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4" />
                                </svg>
                            </a>

                            {{-- Edit --}}
                            <button @click="$dispatch('edit-document', {{ $document->id }})"
                                    class="text-blue-600 hover:text-blue-800 dark:text-blue-400"
                                    title="{{ __('ui.edit') }}">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                </svg>
                            </button>

                            {{-- Delete --}}
                            <form method="POST" action="{{ $document->getDeleteUrl() }}" 
                                  onsubmit="return confirm('{{ __('documents.confirm_delete') }}')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-600 hover:text-red-800 dark:text-red-400"
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