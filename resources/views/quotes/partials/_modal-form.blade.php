{{-- Modal Create Quote --}}
<div @open-quote-modal.window="openCreate()"
     @keydown.escape.window="closeModal()"
     x-cloak>
    
    {{-- Backdrop --}}
    <div x-show="open" 
         x-transition
         class="fixed inset-0 bg-gray-500 bg-opacity-75 z-40" 
         @click="closeModal()"></div>

    {{-- Modal --}}
    <div x-show="open" 
         x-transition
         class="fixed inset-0 z-50 overflow-y-auto p-4" 
         @click.away="closeModal()">
        
        <div class="mx-auto max-w-3xl mt-10">
            <div class="bg-white dark:bg-gray-800 rounded-lg shadow-xl" @click.stop>
                
                {{-- Header --}}
                <div class="px-6 py-4 border-b border-gray-200 dark:border-gray-700">
                    <div class="flex items-center justify-between">
                        <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                            {{ __('quotes.create_quote') }}
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
                <form method="POST" action="{{ route('quotes.store', $project) }}">
                    @csrf

                    <div class="px-6 py-4 max-h-[70vh] overflow-y-auto">
                        @include('quotes.partials._form-fields')
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
                            {{ __('ui.create') }}
                        </button>
                    </div>
                </form>

            </div>
        </div>
    </div>

</div>