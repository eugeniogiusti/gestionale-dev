<div>
    <label class="block text-sm font-semibold text-gray-700 dark:text-gray-300 mb-2">
        {{ __('quotes.notes') }}
    </label>
    <textarea name="notes" 
              x-model="formData.notes"
              rows="3"
              placeholder="{{ __('quotes.placeholder.notes') }}"
              class="w-full px-4 py-3 border border-gray-300 dark:border-gray-600 rounded-lg bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-100 focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500 transition"></textarea>
</div>