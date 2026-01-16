<div class="mt-6 p-4 bg-yellow-50 dark:bg-yellow-900/30 border border-yellow-200 dark:border-yellow-700 rounded-lg">
    <h3 class="text-lg font-medium text-yellow-900 dark:text-yellow-100 mb-2">
        {{ __('twofactor.recovery_codes_title') }}
    </h3>
    
    <p class="text-sm text-yellow-800 dark:text-yellow-200 mb-4">
        {{ __('twofactor.recovery_codes_help') }}
    </p>

    <div class="grid grid-cols-2 gap-2 font-mono text-sm bg-white dark:bg-gray-800 p-4 rounded">
        @foreach ($codes as $code)
            <div class="px-3 py-2 bg-gray-100 dark:bg-gray-700 rounded text-center">
                {{ $code }}
            </div>
        @endforeach
    </div>

    <p class="mt-4 text-xs text-yellow-700 dark:text-yellow-300">
         {{ __('twofactor.recovery_codes_warning') }}
    </p>
</div>