{{-- Modal Footer --}}
<div class="px-6 py-4 bg-gray-50 dark:bg-gray-900/50 border-t border-gray-200 dark:border-gray-700 flex justify-end gap-3">
    <button type="button" 
            @click="close()"
            class="px-4 py-2 border border-gray-300 dark:border-gray-600 rounded-lg text-gray-700 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-700 transition">
        {{ __('ui.cancel') }}
    </button>
    <button type="submit"
            class="px-4 py-2 bg-emerald-600 text-white rounded-lg hover:bg-emerald-700 transition">
        <span x-show="!isEdit">{{ __('ui.create') }}</span>
        <span x-show="isEdit">{{ __('ui.save') }}</span>
    </button>
</div>