<div class="space-y-8">

    {{-- GitHub Section --}}
    <div>
        <div class="flex items-center gap-3 mb-4">
            <svg class="w-6 h-6 text-gray-800 dark:text-white" viewBox="0 0 24 24" fill="currentColor">
                <path d="M12 0C5.374 0 0 5.373 0 12c0 5.302 3.438 9.8 8.207 11.387.599.111.793-.261.793-.577v-2.234c-3.338.726-4.033-1.416-4.033-1.416-.546-1.387-1.333-1.756-1.333-1.756-1.089-.745.083-.729.083-.729 1.205.084 1.839 1.237 1.839 1.237 1.07 1.834 2.807 1.304 3.492.997.107-.775.418-1.305.762-1.604-2.665-.305-5.467-1.334-5.467-5.931 0-1.311.469-2.381 1.236-3.221-.124-.303-.535-1.524.117-3.176 0 0 1.008-.322 3.301 1.23A11.509 11.509 0 0112 5.803c1.02.005 2.047.138 3.006.404 2.291-1.552 3.297-1.23 3.297-1.23.653 1.653.242 2.874.118 3.176.77.84 1.235 1.911 1.235 3.221 0 4.609-2.807 5.624-5.479 5.921.43.372.823 1.102.823 2.222v3.293c0 .319.192.694.801.576C20.566 21.797 24 17.3 24 12c0-6.627-5.373-12-12-12z"/>
            </svg>
            <h3 class="text-base font-semibold text-gray-900 dark:text-white">GitHub</h3>
        </div>

        <div class="space-y-4">
            {{-- PAT field --}}
            <div>
                <label for="github_pat" class="block text-sm font-semibold text-gray-700 dark:text-gray-300 mb-1">
                    {{ __('business_settings.github_pat') }}
                </label>
                <input
                    type="password"
                    id="github_pat"
                    name="github_pat"
                    value="{{ $settings->github_pat }}"
                    autocomplete="off"
                    placeholder="ghp_xxxxxxxxxxxxxxxxxxxx"
                    class="w-full px-4 py-2.5 border border-gray-300 dark:border-gray-600 rounded-lg
                           bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-100
                           focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500
                           placeholder-gray-400 dark:placeholder-gray-500 transition duration-150">
                <p class="mt-2 text-sm text-gray-500 dark:text-gray-400">
                    {{ __('business_settings.github_pat_hint') }}
                    <a href="https://github.com/settings/tokens/new" target="_blank" rel="noopener noreferrer"
                       class="text-emerald-600 hover:text-emerald-700 dark:text-emerald-400 underline">
                        github.com/settings/tokens
                    </a>
                </p>
                @error('github_pat')
                    <p class="mt-1 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                @enderror
            </div>

            {{-- Required scopes info --}}
            <div class="rounded-lg bg-gray-50 dark:bg-gray-700/50 border border-gray-200 dark:border-gray-600 p-4">
                <p class="text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                    {{ __('business_settings.github_required_scopes') }}
                </p>
                <ul class="space-y-1">
                    <li class="flex items-center gap-2 text-sm text-gray-600 dark:text-gray-400">
                        <span class="inline-block w-1.5 h-1.5 rounded-full bg-emerald-500"></span>
                        <code class="text-xs bg-gray-100 dark:bg-gray-600 px-1.5 py-0.5 rounded">repo</code>
                        — {{ __('business_settings.github_scope_repo') }}
                    </li>
                    <li class="flex items-center gap-2 text-sm text-gray-600 dark:text-gray-400">
                        <span class="inline-block w-1.5 h-1.5 rounded-full bg-emerald-500"></span>
                        <code class="text-xs bg-gray-100 dark:bg-gray-600 px-1.5 py-0.5 rounded">read:user</code>
                        — {{ __('business_settings.github_scope_read_user') }}
                    </li>
                </ul>
            </div>
        </div>
    </div>

</div>
