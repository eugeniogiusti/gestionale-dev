@props(['title'])

<div class="mb-6">
    <a href="{{ route('projects.index') }}" 
       class="inline-flex items-center text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-white mb-4">
        <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
        </svg>
        {{ __('projects.back_to_list') }}
    </a>
    
    <h1 class="text-3xl font-bold text-gray-900 dark:text-white">
        {{ $title }}
    </h1>
</div>