<div>
    <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">
        {{ __('documents.file') }} <span class="text-red-500">*</span>
    </label>

    <div class="flex justify-center px-4 py-4 border-2 border-gray-300 dark:border-gray-600 border-dashed rounded-lg hover:border-gray-400 dark:hover:border-gray-500 transition">
        <div class="space-y-1 text-center">
            <svg class="mx-auto h-8 w-8 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12" />
            </svg>
            <div class="flex text-sm text-gray-600 dark:text-gray-400">
                <label class="relative cursor-pointer bg-white dark:bg-gray-800 rounded-md font-medium text-emerald-600 hover:text-emerald-500 focus-within:outline-none">
                    <span>{{ __('documents.choose_file') }}</span>
                    <input type="file"
                           name="file"
                           :required="!isEdit"
                           class="sr-only"
                           @change="handleFileSelect">
                </label>
                <p class="pl-1">{{ __('documents.or_drag') }}</p>
            </div>
            <p class="text-xs text-gray-500 dark:text-gray-400">
                {{ __('documents.file_requirements') }}
            </p>
            <p x-show="fileName"
               x-text="fileName"
               class="text-xs font-medium text-emerald-600 dark:text-emerald-400 mt-1"></p>
        </div>
    </div>
</div>