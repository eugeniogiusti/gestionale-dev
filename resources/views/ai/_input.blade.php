<form class="border-t border-gray-200 px-4 py-3 dark:border-gray-700" @submit.prevent="send">
    <div class="flex items-center gap-2">
        <input
            type="text"
            class="w-full rounded-md border border-gray-300 bg-white px-3 py-2 text-sm text-gray-900 focus:border-emerald-500 focus:ring-emerald-500 dark:border-gray-700 dark:bg-gray-800 dark:text-gray-100"
            placeholder="{{ __('ai.placeholder') }}"
            x-model="input"
            :disabled="loading"
        />
        <button
            type="submit"
            class="rounded-md bg-emerald-600 px-3 py-2 text-sm font-medium text-white hover:bg-emerald-700 disabled:opacity-50"
            :disabled="loading || !input.trim()"
        >
            {{ __('ai.send') }}
        </button>
    </div>
</form>
