<div class="px-4 py-3">
    <div
        class="h-64 space-y-3 overflow-y-auto pr-2 text-sm"
        x-ref="messages"
    >
        <template x-if="messages.length === 0">
            <div class="text-gray-500 dark:text-gray-400">
                {{ __('ai.empty_state') }}
            </div>
        </template>

        <template x-for="(msg, idx) in messages" :key="idx">
            <div class="flex" :class="msg.role === 'user' ? 'justify-end' : 'justify-start'">
                <div
                    class="max-w-[80%] rounded-lg px-3 py-2"
                    :class="msg.role === 'user'
                        ? 'bg-emerald-600 text-white'
                        : 'bg-gray-100 text-gray-900 dark:bg-gray-800 dark:text-gray-100'"
                    x-text="msg.content"
                ></div>
            </div>
        </template>

        <template x-if="loading">
            <div class="flex justify-start">
                <div class="max-w-[80%] rounded-lg bg-gray-100 px-3 py-2 text-gray-900 dark:bg-gray-800 dark:text-gray-100">
                    <span class="inline-flex items-center gap-1">
                        <span class="h-1.5 w-1.5 animate-pulse rounded-full bg-gray-400"></span>
                        <span class="h-1.5 w-1.5 animate-pulse rounded-full bg-gray-400 [animation-delay:120ms]"></span>
                        <span class="h-1.5 w-1.5 animate-pulse rounded-full bg-gray-400 [animation-delay:240ms]"></span>
                    </span>
                    <span class="sr-only">{{ __('ai.loading') }}</span>
                </div>
            </div>
        </template>

        <template x-if="error">
            <div class="text-red-600 dark:text-red-400" x-text="error"></div>
        </template>

        <template x-if="error && (errorCode === 'rate_limited' || errorCode === 'provider_overloaded')">
            <button
                type="button"
                class="mt-2 inline-flex items-center rounded-md bg-emerald-600 px-3 py-1.5 text-xs font-medium text-white hover:bg-emerald-700"
                @click="retry"
            >
                {{ __('ai.retry') }}
            </button>
        </template>
    </div>
</div>
