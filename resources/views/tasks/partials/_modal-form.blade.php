{{-- Task Modal (Create/Edit) --}}
<div x-data="taskModal()"
     @open-task-modal.window="openCreate()"
     @edit-task.window="openEdit($event.detail)"
     @keydown.escape.window="closeModal()"
     x-cloak>

    {{-- Backdrop --}}
    <div x-show="open"
         x-transition:enter="ease-out duration-300"
         x-transition:enter-start="opacity-0"
         x-transition:enter-end="opacity-100"
         x-transition:leave="ease-in duration-200"
         x-transition:leave-start="opacity-100"
         x-transition:leave-end="opacity-0"
         class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity z-40"
         @click="closeModal()"></div>

    {{-- Modal --}}
    <div x-show="open"
         x-transition:enter="ease-out duration-300"
         x-transition:enter-start="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
         x-transition:enter-end="opacity-100 translate-y-0 sm:scale-100"
         x-transition:leave="ease-in duration-200"
         x-transition:leave-start="opacity-100 translate-y-0 sm:scale-100"
         x-transition:leave-end="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
         class="fixed inset-0 z-50 overflow-y-auto p-4 sm:p-6 md:p-20"
         @click.away="closeModal()">

        <div class="mx-auto max-w-xl">
            <div class="relative bg-white dark:bg-gray-800 rounded-lg shadow-xl" @click.stop>

                {{-- Header --}}
                <div class="px-4 py-3 border-b border-gray-200 dark:border-gray-700">
                    <div class="flex items-center justify-between">
                        <h3 class="text-base font-semibold text-gray-900 dark:text-white">
                            <span x-show="!isEdit">{{ __('tasks.create_task') }}</span>
                            <span x-show="isEdit">{{ __('tasks.edit_task') }}</span>
                            <span x-show="isEdit" x-text="' - ' + formData.title" class="font-normal text-gray-500 dark:text-gray-400"></span>
                        </h3>
                        <button @click="closeModal()" class="text-gray-400 hover:text-gray-500 dark:hover:text-gray-300">
                            <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                            </svg>
                        </button>
                    </div>
                </div>

                {{-- Form --}}
                <form method="POST"
                      enctype="multipart/form-data"
                      :action="isEdit
                          ? '{{ route('tasks.update', [$project, '__TASK_ID__']) }}'.replace('__TASK_ID__', taskId)
                          : '{{ route('tasks.store', $project) }}'">
                    @csrf
                    <input type="hidden" name="_method" x-bind:value="isEdit ? 'PUT' : 'POST'">

                    {{-- Form Fields --}}
                    <div class="px-4 py-3 max-h-[60vh] overflow-y-auto">
                        @include('tasks.partials._form-fields')
                    </div>

                    {{-- Footer --}}
                    <div class="px-4 py-3 bg-gray-50 dark:bg-gray-900/50 border-t border-gray-200 dark:border-gray-700 flex justify-end gap-2">
                        <button type="button" @click="closeModal()"
                                class="px-3 py-1.5 text-sm border border-gray-300 dark:border-gray-600 rounded-lg text-gray-700 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-700 transition">
                            {{ __('ui.cancel') }}
                        </button>
                        <button type="submit"
                                :disabled="!formData.title || !formData.type || !formData.status"
                                :class="(!formData.title || !formData.type || !formData.status) ? 'bg-gray-300 dark:bg-gray-600 cursor-not-allowed' : 'bg-emerald-600 hover:bg-emerald-700'"
                                class="px-3 py-1.5 text-sm text-white rounded-lg transition">
                            <span x-show="!isEdit">{{ __('ui.create') }}</span>
                            <span x-show="isEdit">{{ __('ui.save') }}</span>
                        </button>
                    </div>

                </form>

                {{-- Attached documents list (edit mode only) --}}
                <template x-if="isEdit && formData.documents && formData.documents.length > 0">
                    <div class="px-4 py-3 border-t border-gray-200 dark:border-gray-700">
                        <p class="text-xs font-medium text-gray-500 dark:text-gray-400 uppercase mb-2">
                            {{ __('task_documents.document_list') }}
                        </p>
                        <div class="space-y-2">
                            <template x-for="doc in formData.documents" :key="doc.id">
                                <div class="flex items-center justify-between py-1.5 px-2 bg-gray-50 dark:bg-gray-700/50 rounded-lg">
                                    <div class="flex items-center gap-2 min-w-0">
                                        <svg class="w-4 h-4 text-gray-400 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.172 7l-6.586 6.586a2 2 0 102.828 2.828l6.414-6.586a4 4 0 00-5.656-5.656l-6.415 6.585a6 6 0 108.486 8.486L20.5 13" />
                                        </svg>
                                        <span class="text-sm text-gray-700 dark:text-gray-300 truncate"
                                              x-text="doc.name + '.' + doc.extension"></span>
                                    </div>
                                    <div class="flex items-center gap-2 flex-shrink-0 ml-2">
                                        <a :href="doc.download_url"
                                           target="_blank"
                                           class="text-emerald-600 hover:text-emerald-800 dark:text-emerald-400"
                                           title="{{ __('ui.download') }}">
                                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4" />
                                            </svg>
                                        </a>
                                        <form :action="doc.delete_url" method="POST"
                                              @submit.prevent="if(confirm('{{ __('task_documents.confirm_delete') }}')) $el.submit()">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit"
                                                    class="text-red-500 hover:text-red-700 dark:text-red-400"
                                                    title="{{ __('ui.delete') }}">
                                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                                </svg>
                                            </button>
                                        </form>
                                    </div>
                                </div>
                            </template>
                        </div>
                    </div>
                </template>

            </div>
        </div>
    </div>

</div>
