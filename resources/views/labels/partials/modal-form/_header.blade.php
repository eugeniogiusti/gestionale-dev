{{-- Modal Header --}}
<div class="px-6 py-4 border-b border-gray-200 dark:border-gray-700">
    <div class="flex items-center justify-between">
        <h3 class="text-lg font-semibold text-gray-900 dark:text-white">
            <span x-show="!isEdit">{{ __('labels.create_label') }}</span>
            <span x-show="isEdit">{{ __('labels.edit_label') }}</span>
        </h3>
        <button @click="close()" 
                class="text-gray-400 hover:text-gray-500 dark:hover:text-gray-300">
            <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
            </svg>
        </button>
    </div>
</div>