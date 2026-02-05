<section>
    <header>
        <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
            {{ __('profile.locale.title') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
            {{ __('profile.locale.subtitle') }}
        </p>
    </header>

    <form method="get" class="mt-6">
        <div>
            <x-input-label for="locale" :value="__('profile.locale.label')" />
            <select 
                id="locale" 
                name="locale"
                class="mt-1 block w-full border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm"
                onchange="window.location.href='{{ url('locale') }}/' + this.value + '#locale-preference'"
            >
                <option value="da" {{ app()->getLocale() == 'da' ? 'selected' : '' }}>
                    🇩🇰 Dansk
                </option>
                <option value="de" {{ app()->getLocale() == 'de' ? 'selected' : '' }}>
                    🇩🇪 Deutsch
                </option>
                <option value="it" {{ app()->getLocale() == 'it' ? 'selected' : '' }}>
                    🇮🇹 Italiano
                </option>
                <option value="en" {{ app()->getLocale() == 'en' ? 'selected' : '' }}>
                    🇬🇧 English
                </option>
                <option value="es" {{ app()->getLocale() == 'es' ? 'selected' : '' }}>
                    🇪🇸 Español
                </option>
                <option value="fr" {{ app()->getLocale() == 'fr' ? 'selected' : '' }}>
                    🇫🇷 Français
                </option>
                <option value="nl" {{ app()->getLocale() == 'nl' ? 'selected' : '' }}>
                    🇳🇱 Nederlands
                </option>
                <option value="pl" {{ app()->getLocale() == 'pl' ? 'selected' : '' }}>
                    🇵🇱 Polski
                </option>
                <option value="pt" {{ app()->getLocale() == 'pt' ? 'selected' : '' }}>
                    🇵🇹 Português
                </option>
                <option value="ro" {{ app()->getLocale() == 'ro' ? 'selected' : '' }}>
                    🇷🇴 Română
                </option>
                <option value="uk" {{ app()->getLocale() == 'uk' ? 'selected' : '' }}>
                    🇺🇦 Українська
                </option>
            </select>
        </div>
    </form>
</section>
