<div>
    <label class="block text-sm font-semibold text-gray-700 dark:text-gray-300 mb-2">
        {{ __('quotes.items') }} <span class="text-red-500">*</span>
    </label>
    
    <div class="space-y-3">
        <template x-for="(item, index) in formData.items" :key="index">
            <div class="p-4 border border-gray-300 dark:border-gray-600 rounded-lg bg-gray-50 dark:bg-gray-700/50">
                <div class="grid grid-cols-1 md:grid-cols-12 gap-3">
                    
                    {{-- Description --}}
                    <div class="md:col-span-8">
                        <input type="text" 
                               :name="'items[' + index + '][description]'"
                               x-model="item.description"
                               required
                               placeholder="{{ __('quotes.placeholder.item_description') }}"
                               class="w-full px-3 py-2 border border-gray-300 dark:border-gray-600 rounded-lg bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-100 text-sm">
                    </div>

                    {{-- Price --}}
                    <div class="md:col-span-3">
                        <input type="number" 
                               :name="'items[' + index + '][price]'"
                               x-model="item.price"
                               @input="calculateTotal()"
                               required
                               step="0.01"
                               min="0"
                               placeholder="{{ __('quotes.placeholder.item_price') }}"
                               class="w-full px-3 py-2 border border-gray-300 dark:border-gray-600 rounded-lg bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-100 text-sm">
                    </div>

                    {{-- Remove --}}
                    <div class="md:col-span-1 flex items-center">
                        <button type="button" 
                                @click="removeItem(index)"
                                class="text-red-600 hover:text-red-800 dark:text-red-400"
                                title="{{ __('quotes.remove_item') }}">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                            </svg>
                        </button>
                    </div>
                </div>
            </div>
        </template>
    </div>

    <button type="button" 
            @click="addItem()"
            class="mt-3 inline-flex items-center px-4 py-2 border border-gray-300 dark:border-gray-600 rounded-lg text-sm font-medium text-gray-700 dark:text-gray-300 bg-white dark:bg-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600 transition">
        <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
        </svg>
        {{ __('quotes.add_item') }}
    </button>

    <p class="mt-2 text-xs text-gray-500 dark:text-gray-400">
        {{ __('quotes.items_hint') }}
    </p>

    @error('items')
        <p class="mt-1 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
    @enderror
</div>