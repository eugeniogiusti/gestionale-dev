<div class="space-y-6">
    
    {{-- Description --}}
    <div class="border-l-4 border-emerald-500 pl-4">
        <div class="flex items-center justify-between mb-3">
            <h3 class="text-lg font-semibold text-gray-900 dark:text-white">
                {{ __('projects.description') }}
            </h3>
        </div>
        
        @if($project->description)
            <div class="prose dark:prose-invert max-w-none text-gray-700 dark:text-gray-300">
                {!! nl2br(e($project->description)) !!}
            </div>
        @else
            <p class="text-sm text-gray-500 dark:text-gray-400 italic">
                {{ __('projects.no_description') }}
            </p>
        @endif
    </div>

    {{-- Divider --}}
    <div class="border-t border-gray-200 dark:border-gray-700"></div>

    {{-- Notes --}}
    <div class="border-l-4 border-blue-500 pl-4">
        <div class="flex items-center justify-between mb-3">
            <h3 class="text-lg font-semibold text-gray-900 dark:text-white">
                {{ __('projects.notes') }}
            </h3>
        </div>
        
        @if($project->notes)
            <div class="prose dark:prose-invert max-w-none text-gray-700 dark:text-gray-300">
                {!! nl2br(e($project->notes)) !!}
            </div>
        @else
            <p class="text-sm text-gray-500 dark:text-gray-400 italic">
                {{ __('projects.no_notes') }}
            </p>
        @endif
    </div>

</div>