<div class="px-6 py-4 bg-gray-50 dark:bg-gray-900 rounded-b-lg flex justify-between">
    <a href="{{ route('projects.index') }}" 
       class="px-4 py-2 text-gray-700 dark:text-gray-300 hover:text-gray-900 dark:hover:text-white transition">
        {{ __('projects.cancel') }}
    </a>
    
    <x-button type="submit" variant="primary">
        {{ __('projects.save') }}
    </x-button>
</div>