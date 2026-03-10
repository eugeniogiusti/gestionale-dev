{{-- Search Filter --}}
<div>
    <input
        type="text"
        name="search"
        value="{{ request('search') }}"
        placeholder="{{ __('taxes.placeholder.search') }}"
        class="w-full px-4 py-2 border border-gray-300 dark:border-gray-600 rounded-lg bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-100"
    >
</div>
