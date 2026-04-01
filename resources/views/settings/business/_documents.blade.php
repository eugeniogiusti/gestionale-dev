{{-- Business Documents --}}
<div id="documents" class="bg-white dark:bg-gray-800 rounded-lg shadow-sm p-6 space-y-6">

    <div>
        <h3 class="text-lg font-semibold text-gray-900 dark:text-white">{{ __('business_settings.documents.title') }}</h3>
        <p class="mt-1 text-sm text-gray-500 dark:text-gray-400">{{ __('business_settings.documents.description') }}</p>
    </div>

    {{-- Upload form --}}
    <form method="POST" action="{{ route('settings.business-documents.store') }}" enctype="multipart/form-data" class="space-y-4 border border-gray-200 dark:border-gray-700 rounded-lg p-4">
        @csrf
        <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
            <div>
                <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">
                    {{ __('business_settings.documents.name') }} <span class="text-red-500">*</span>
                </label>
                <input
                    type="text"
                    name="name"
                    required
                    placeholder="{{ __('business_settings.documents.placeholder_name') }}"
                    class="w-full px-3 py-2 border border-gray-300 dark:border-gray-600 rounded-lg bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-100 text-sm"
                >
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">
                    {{ __('business_settings.documents.notes') }}
                </label>
                <input
                    type="text"
                    name="notes"
                    placeholder="{{ __('business_settings.documents.placeholder_notes') }}"
                    class="w-full px-3 py-2 border border-gray-300 dark:border-gray-600 rounded-lg bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-100 text-sm"
                >
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">
                    {{ __('business_settings.documents.file') }} <span class="text-red-500">*</span>
                </label>
                <input
                    type="file"
                    name="file"
                    required
                    class="w-full text-sm text-gray-500 dark:text-gray-400 file:mr-3 file:py-1.5 file:px-3 file:rounded file:border-0 file:text-sm file:font-medium file:bg-emerald-50 file:text-emerald-700 hover:file:bg-emerald-100"
                >
            </div>
        </div>
        <div class="flex justify-end">
            <button type="submit" class="px-4 py-2 bg-emerald-600 hover:bg-emerald-700 text-white text-sm font-medium rounded-lg transition">
                {{ __('business_settings.documents.upload') }}
            </button>
        </div>
    </form>

    {{-- Documents list --}}
    @if($businessDocs->isNotEmpty())
        <div class="overflow-x-auto">
            <table class="w-full text-sm">
                <thead>
                    <tr class="border-b border-gray-200 dark:border-gray-700 text-left text-xs font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider">
                        <th class="pb-3 pr-4">{{ __('business_settings.documents.name') }}</th>
                        <th class="pb-3 pr-4">{{ __('business_settings.documents.notes') }}</th>
                        <th class="pb-3 pr-4">{{ __('business_settings.documents.uploaded_at') }}</th>
                        <th class="pb-3 text-right">{{ __('ui.actions') }}</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-200 dark:divide-gray-700">
                    @foreach($businessDocs as $doc)
                        <tr class="hover:bg-gray-50 dark:hover:bg-gray-700/30" x-data="{ editing: false }">
                            {{-- View mode --}}
                            <td class="py-3 pr-4" x-show="!editing">
                                <span class="font-medium text-gray-900 dark:text-white">{{ $doc->name }}</span>
                                <span class="ml-1 text-xs text-gray-400 uppercase">.{{ $doc->file_extension }}</span>
                                @if($doc->file_size)
                                    <span class="ml-1 text-xs text-gray-400">{{ $doc->file_size }}</span>
                                @endif
                            </td>
                            <td class="py-3 pr-4 text-gray-500 dark:text-gray-400" x-show="!editing">
                                {{ $doc->notes ?? '—' }}
                            </td>

                            {{-- Edit mode --}}
                            <td class="py-3 pr-4" x-show="editing" x-cloak colspan="2">
                                <form method="POST" action="{{ route('settings.business-documents.update', $doc) }}" class="flex items-center gap-2">
                                    @csrf
                                    @method('PATCH')
                                    <input type="text" name="name" value="{{ $doc->name }}" required
                                           class="flex-1 px-2 py-1 text-sm border border-gray-300 dark:border-gray-600 rounded bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-100 focus:ring-1 focus:ring-emerald-500">
                                    <input type="text" name="notes" value="{{ $doc->notes }}" placeholder="{{ __('business_settings.documents.notes') }}"
                                           class="flex-1 px-2 py-1 text-sm border border-gray-300 dark:border-gray-600 rounded bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-100 focus:ring-1 focus:ring-emerald-500">
                                    <button type="submit" class="px-3 py-1 text-xs font-medium bg-emerald-600 hover:bg-emerald-700 text-white rounded transition">
                                        {{ __('ui.save') }}
                                    </button>
                                    <button type="button" @click="editing = false" class="px-3 py-1 text-xs font-medium bg-gray-100 hover:bg-gray-200 dark:bg-gray-700 dark:hover:bg-gray-600 text-gray-700 dark:text-gray-300 rounded transition">
                                        {{ __('ui.cancel') }}
                                    </button>
                                </form>
                            </td>

                            <td class="py-3 pr-4 text-gray-500 dark:text-gray-400" x-show="!editing">
                                {{ $doc->uploaded_at?->format('d/m/Y') ?? '—' }}
                            </td>
                            <td class="py-3" x-show="!editing">
                                <div class="flex items-center justify-end gap-2">
                                    <x-action-button type="button" variant="warning" title="{{ __('ui.edit') }}" @click="editing = true">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                        </svg>
                                    </x-action-button>
                                    <x-action-button :href="$doc->getPreviewUrl()" variant="info" target="_blank" title="{{ __('documents.preview') }}">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                        </svg>
                                    </x-action-button>
                                    <x-action-button :href="$doc->getDownloadUrl()" variant="primary" title="{{ __('documents.download') }}">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4" />
                                        </svg>
                                    </x-action-button>
                                    <form method="POST" action="{{ route('settings.business-documents.destroy', $doc) }}" data-confirm="{{ __('business_settings.documents.delete_confirm') }}">
                                        @csrf
                                        @method('DELETE')
                                        <x-action-button type="submit" variant="danger" title="{{ __('ui.delete') }}">
                                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                            </svg>
                                        </x-action-button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @else
        <p class="text-sm text-gray-500 dark:text-gray-400 italic text-center py-4">
            {{ __('business_settings.documents.no_documents') }}
        </p>
    @endif
</div>
