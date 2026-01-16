<div class="mt-4 p-4 bg-green-50 dark:bg-green-900/30 rounded-md text-sm text-green-800 dark:text-green-200">
    {{ __('twofactor.enabled_since', ['date' => $user->two_factor_confirmed_at?->format('d/m/Y H:i')]) }}
</div>

<form method="post" action="{{ route('two-factor.disable') }}" class="mt-4 space-y-4">
    @csrf
    @method('DELETE')

    <div>
        <x-input-label for="two_factor_password" :value="__('twofactor.password_label')" />
        <x-text-input
            id="two_factor_password"
            name="password"
            type="password"
            class="mt-1 block w-full"
            autocomplete="current-password"
        />
        <x-input-error :messages="$errors->get('password')" class="mt-2" />
    </div>

    <div class="flex gap-3">
        <x-danger-button>
            {{ __('twofactor.disable_button') }}
        </x-danger-button>

        <a href="{{ route('profile.trusted-devices.index') }}">
            <x-secondary-button type="button">
                {{ __('twofactor.trusted_devices.manage_button') }}
            </x-secondary-button>
        </a>
    </div>
</form>