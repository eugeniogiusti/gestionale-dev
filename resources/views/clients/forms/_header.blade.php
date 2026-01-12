@props(['title', 'subtitle' => null])

<div class="flex items-center justify-between">
    <div>
        <h1 class="text-3xl font-bold text-gray-900 dark:text-gray-100">
            {{ $title }}
        </h1>
        @if($subtitle)
            <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
                {{ $subtitle }}
            </p>
        @endif
    </div>
    
    <a href="{{ route('clients.index') }}">
        <x-button variant="secondary">
            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/>
            </svg>
            {{ __('clients.cancel') }}
        </x-button>
    </a>
</div>