{{-- Upload Invoice Modal --}}
<div x-data="uploadInvoiceModal()"
     @open-upload-modal.window="openModal($event.detail)"
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
        
        <div class="mx-auto max-w-lg">
            <div class="relative bg-white dark:bg-gray-800 rounded-lg shadow-xl" @click.stop>
                
                {{-- Header --}}
                <div class="px-6 py-4 border-b border-gray-200 dark:border-gray-700">
                    <div class="flex items-center justify-between">
                        <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                            {{ __('invoices.upload_invoice') }}
                        </h3>
                        <button @click="closeModal()" 
                                class="text-gray-400 hover:text-gray-500 dark:hover:text-gray-300">
                            <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                            </svg>
                        </button>
                    </div>
                </div>

                {{-- Form --}}
                <form method="POST" 
                      enctype="multipart/form-data"
                      :action="uploadUrl">
                    @csrf

                    <div class="px-6 py-4">
                        
                        {{-- File Input --}}
                        <div>
                            <label class="block text-sm font-semibold text-gray-700 dark:text-gray-300 mb-2">
                                {{ __('invoices.select_file') }} <span class="text-red-500">*</span>
                            </label>
                            
                            <input type="file" 
                                   name="invoice" 
                                   accept=".pdf"
                                   required
                                   class="block w-full text-sm text-gray-900 dark:text-gray-100 
                                          border border-gray-300 dark:border-gray-600 rounded-lg 
                                          cursor-pointer bg-white dark:bg-gray-700
                                          file:mr-4 file:py-2 file:px-4
                                          file:rounded-l-lg file:border-0
                                          file:text-sm file:font-semibold
                                          file:bg-emerald-50 file:text-emerald-700
                                          hover:file:bg-emerald-100
                                          dark:file:bg-emerald-900 dark:file:text-emerald-300">
                            
                            <p class="mt-2 text-xs text-gray-500 dark:text-gray-400">
                                {{ __('invoices.upload_help') }}
                            </p>
                        </div>

                    </div>

                    {{-- Footer --}}
                    <div class="px-6 py-4 bg-gray-50 dark:bg-gray-900/50 border-t border-gray-200 dark:border-gray-700 flex justify-end gap-3">
                        <button type="button" 
                                @click="closeModal()"
                                class="px-4 py-2 border border-gray-300 dark:border-gray-600 rounded-lg text-gray-700 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-700 transition">
                            {{ __('ui.cancel') }}
                        </button>
                        <button type="submit"
                                class="px-4 py-2 bg-emerald-600 text-white rounded-lg hover:bg-emerald-700 transition">
                            {{ __('invoices.upload_invoice') }}
                        </button>
                    </div>

                </form>

            </div>
        </div>
    </div>

</div>