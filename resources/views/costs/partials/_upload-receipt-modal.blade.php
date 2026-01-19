{{-- Upload Receipt Modal --}}
<div x-data="receiptUploadModal({{ $project->id }})"
     @upload-receipt.window="openUpload($event.detail)"
     @keydown.escape.window="close()"
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
         @click="close()"></div>

    {{-- Modal --}}
    <div x-show="open"
         x-transition:enter="ease-out duration-300"
         x-transition:enter-start="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
         x-transition:enter-end="opacity-100 translate-y-0 sm:scale-100"
         x-transition:leave="ease-in duration-200"
         x-transition:leave-start="opacity-100 translate-y-0 sm:scale-100"
         x-transition:leave-end="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
         class="fixed inset-0 z-50 overflow-y-auto p-4 sm:p-6 md:p-20"
         @click.away="close()">
        
        <div class="mx-auto max-w-md">
            <div class="relative bg-white dark:bg-gray-800 rounded-lg shadow-xl" @click.stop>
                
                {{-- Header --}}
                <div class="px-6 py-4 border-b border-gray-200 dark:border-gray-700">
                    <div class="flex items-center justify-between">
                        <h3 class="text-lg font-semibold text-gray-900 dark:text-white">
                            {{ __('receipts.upload_receipt') }}
                        </h3>
                        <button @click="close()" 
                                class="text-gray-400 hover:text-gray-500 dark:hover:text-gray-300">
                            <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                            </svg>
                        </button>
                    </div>
                </div>

                {{-- Form --}}
                <form method="POST" 
                      :action="uploadUrl"
                      enctype="multipart/form-data"
                      @submit="handleSubmit">
                    @csrf
                    
                    <div class="px-6 py-4">
                        
                        {{-- File Input --}}
                        <div>
                            <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                                {{ __('receipts.select_file') }}
                            </label>
                            
                            {{-- Custom File Input --}}
                            <div class="mt-1 flex justify-center px-6 pt-5 pb-6 border-2 border-gray-300 dark:border-gray-600 border-dashed rounded-lg hover:border-gray-400 dark:hover:border-gray-500 transition">
                                <div class="space-y-1 text-center">
                                    <svg class="mx-auto h-12 w-12 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12" />
                                    </svg>
                                    <div class="flex text-sm text-gray-600 dark:text-gray-400">
                                        <label class="relative cursor-pointer bg-white dark:bg-gray-800 rounded-md font-medium text-emerald-600 hover:text-emerald-500 focus-within:outline-none">
                                            <span>{{ __('receipts.choose_file') }}</span>
                                            <input type="file" 
                                                   name="receipt" 
                                                   accept=".pdf,.jpg,.jpeg,.png"
                                                   required
                                                   class="sr-only"
                                                   @change="handleFileSelect">
                                        </label>
                                        <p class="pl-1">{{ __('receipts.or_drag') }}</p>
                                    </div>
                                    <p class="text-xs text-gray-500 dark:text-gray-400">
                                        {{ __('receipts.file_requirements') }}
                                    </p>
                                    
                                    {{-- Selected File Name --}}
                                    <p x-show="fileName" 
                                       x-text="fileName"
                                       class="text-sm font-medium text-emerald-600 dark:text-emerald-400 mt-2"></p>
                                </div>
                            </div>
                        </div>

                    </div>

                    {{-- Footer --}}
                    <div class="px-6 py-4 bg-gray-50 dark:bg-gray-900/50 border-t border-gray-200 dark:border-gray-700 flex justify-end gap-3">
                        <button type="button" 
                                @click="close()"
                                class="px-4 py-2 border border-gray-300 dark:border-gray-600 rounded-lg text-gray-700 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-700 transition">
                            {{ __('ui.cancel') }}
                        </button>
                        <button type="submit"
                                :disabled="!fileName"
                                :class="fileName ? 'bg-emerald-600 hover:bg-emerald-700' : 'bg-gray-400 cursor-not-allowed'"
                                class="px-4 py-2 text-white rounded-lg transition">
                            {{ __('ui.upload') }}
                        </button>
                    </div>

                </form>

            </div>
        </div>
    </div>

</div>