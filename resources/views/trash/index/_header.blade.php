<div class="flex items-center justify-between mb-6">
    <div class="flex items-center gap-4">
        <div class="p-3 bg-red-100 dark:bg-red-900/20 rounded-lg">
            <svg class="w-8 h-8 text-red-600 dark:text-red-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
            </svg>
        </div>

        <div>
            <h1 class="text-3xl font-bold text-gray-900 dark:text-gray-100">
                {{ __('trash.title') }}
            </h1>
            <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
                {{ __('trash.subtitle') }}
            </p>
        </div>
    </div>

    @if($stats['total'] > 0)
        <form method="POST" action="{{ route('trash.empty') }}"
              data-confirm="{{ __('trash.confirm_empty') }}">
            @csrf
            @method('DELETE')

            <x-button type="submit" variant="danger">
                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                </svg>
                {{ __('trash.empty_trash') }}
            </x-button>
        </form>
    @endif
</div>
