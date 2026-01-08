<x-guest-layout>
    <div class="mb-4 text-sm text-gray-600 dark:text-gray-400">
        {{ __('twofactor.challenge_message') }}
    </div>

    @if ($errors->any())
        <div class="mb-4 text-sm text-red-600 dark:text-red-400">
            {{ $errors->first('one_time_password') }}
        </div>
    @endif

    <div x-data="{ useRecovery: false }">
        <form method="POST" action="{{ route('2fa.verify') }}">
            @csrf

            <!-- Input Codice (cambia dinamicamente) -->
            <div>
                <x-input-label 
                    for="one_time_password" 
                    x-text="useRecovery ? '{{ __('twofactor.recovery_code_label') }}' : '{{ __('twofactor.code_label') }}'"
                />
                <x-text-input
                    id="one_time_password"
                    name="one_time_password"
                    type="text"
                    class="mt-1 block w-full"
                    required
                    autofocus
                    autocomplete="off"
                    x-bind:placeholder="useRecovery ? '{{ __('twofactor.recovery_code_placeholder') }}' : '{{ __('twofactor.code_placeholder') }}'"
                    x-bind:inputmode="useRecovery ? 'text' : 'numeric'"
                />
                <x-input-error class="mt-2" :messages="$errors->get('one_time_password')" />
            </div>

            <!-- Checkbox Ricorda Device -->
            <div class="block mt-4">
                <label for="remember_device" class="inline-flex items-center">
                    <input 
                        id="remember_device" 
                        type="checkbox" 
                        name="remember_device" 
                        value="1"
                        class="rounded dark:bg-gray-900 border-gray-300 dark:border-gray-700 text-indigo-600 shadow-sm focus:ring-indigo-500 dark:focus:ring-indigo-600 dark:focus:ring-offset-gray-800"
                    >
                    <span class="ms-2 text-sm text-gray-600 dark:text-gray-400">
                        {{ __('twofactor.remember_device') }}
                    </span>
                </label>
            </div>

            <!-- Toggle Link -->
            <div class="mt-4">
                <button 
                    type="button"
                    @click="useRecovery = !useRecovery"
                    class="text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 underline"
                    x-text="useRecovery ? '{{ __('twofactor.use_authentication_code') }}' : '{{ __('twofactor.use_recovery_code') }}'"
                ></button>
            </div>

            <div class="flex items-center justify-end mt-4">
                <x-primary-button>
                    {{ __('twofactor.verify_button') }}
                </x-primary-button>
            </div>
        </form>
    </div>
</x-guest-layout>