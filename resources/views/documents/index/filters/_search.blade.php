{{-- Search Filter --}}
<div>
    <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
        {{ __('ui.search') }}
    </label>
    <div class="flex gap-2">
        <input type="text" 
               name="search" 
               value="{{ request('search') }}"
               placeholder="{{ __('documents.placeholder.search') }}"
               class="flex-1 px-4 py-2 border border-gray-300 dark:border-gray-600 rounded-lg bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-100">
        <button type="submit" 
                class="px-4 py-2 bg-emerald-600 text-white rounded-lg hover:bg-emerald-700">
            {{ __('ui.filter') }}
        </button>
    </div>
</div>