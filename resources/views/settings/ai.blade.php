<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('ai_settings.title') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 shadow sm:rounded-lg p-6">
                <header>
                    <h3 class="text-lg font-medium text-gray-900 dark:text-gray-100">
                        {{ __('ai_settings.title') }}
                    </h3>
                    <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
                        {{ __('ai_settings.subtitle') }}
                    </p>
                </header>

                <form method="post" action="{{ route('settings.ai.update') }}" class="mt-6 space-y-6">
                    @csrf
                    @method('patch')

                    <div>
                        <label class="flex items-center gap-3">
                            <input
                                type="checkbox"
                                name="ai_enabled"
                                value="1"
                                class="h-4 w-4 rounded border-gray-300 text-emerald-600 focus:ring-emerald-500 dark:border-gray-700"
                                {{ $settings->ai_enabled ? 'checked' : '' }}
                            >
                            <span class="text-sm text-gray-700 dark:text-gray-300">{{ __('ai_settings.enable_label') }}</span>
                        </label>
                    </div>

                    <div>
                        <x-input-label for="ai_api_key" :value="__('ai_settings.api_key_label')" />
                        <input
                            id="ai_api_key"
                            name="ai_api_key"
                            type="password"
                            autocomplete="off"
                            class="mt-1 block w-full rounded-md border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-emerald-500 focus:ring-emerald-500"
                            placeholder="sk-..."
                        />
                        <p class="mt-2 text-xs text-gray-500 dark:text-gray-400">{{ __('ai_settings.api_key_help') }}</p>
                        @error('ai_api_key')
                            <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="flex items-center gap-4">
                        <x-primary-button>
                            {{ __('ai_settings.save') }}
                        </x-primary-button>

                        @if (session('success'))
                            <p class="text-sm text-emerald-600">{{ session('success') }}</p>
                        @endif
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
