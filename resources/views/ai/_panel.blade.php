<div
    class="fixed right-4 bottom-4 z-40"
    data-ai-endpoint="{{ route('projects.chat', $project) }}"
    data-ai-history-endpoint="{{ route('projects.chat.history', $project) }}"
    data-project-name="{{ $project->name }}"
    data-project-id="{{ $project->id }}"
    data-error-text="{{ __('ai.error_generic') }}"
    x-data="aiChat($el)"
    x-cloak
>
    <button
        type="button"
        class="ai-chat-toggle flex items-center gap-2 rounded-full bg-emerald-600 px-4 py-2 text-sm font-medium text-white shadow-lg hover:bg-emerald-700 transition"
        @click="toggle"
        x-cloak
    >
        <span x-cloak x-show="!open">{{ __('ai.open') }}</span>
        <span x-cloak x-show="open">{{ __('ai.close') }}</span>
    </button>

    <div
        class="mt-3 w-[380px] max-w-[90vw] rounded-xl border border-gray-200 bg-white shadow-xl dark:border-gray-700 dark:bg-gray-900"
        x-show="open"
        x-transition
        x-cloak
    >
        <div class="flex items-center justify-between border-b border-gray-200 px-4 py-3 dark:border-gray-700">
            <div>
                <div class="text-sm font-semibold text-gray-900 dark:text-gray-100">{{ __('ai.title') }}</div>
                <div class="text-xs text-gray-500 dark:text-gray-400" x-text="projectName"></div>
            </div>
            <button
                type="button"
                class="rounded-md px-2 py-1 text-xs text-gray-500 hover:text-gray-700 dark:text-gray-400 dark:hover:text-gray-200"
                @click="toggle"
            >
                {{ __('ai.close') }}
            </button>
        </div>

        @include('ai._messages')
        @include('ai._input')
    </div>
</div>
