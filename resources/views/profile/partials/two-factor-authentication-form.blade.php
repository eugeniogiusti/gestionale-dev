@php
    $user = $user ?? auth()->user();
    $pendingSecret = session('2fa_secret');
    $hasConfirmed = !is_null($user->two_factor_confirmed_at);
@endphp

<section>
    <header>
        <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
            {{ __('twofactor.title') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
            {{ __('twofactor.subtitle') }}
        </p>
    </header>

    {{--Status 1 - 2FA Enable --}}
    @if ($hasConfirmed)
        <div class="mt-4 p-4 bg-green-50 dark:bg-green-900/30 rounded-md text-sm text-green-800 dark:text-green-200">
            {{ __('twofactor.enabled_since', ['date' => $user->two_factor_confirmed_at?->format('d/m/Y H:i')]) }}
        </div>

        {{-- deactivation form --}}
        <form method="post" action="{{ route('two-factor.disable') }}" class="mt-4 space-y-4">
            @csrf

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

                <a href="{{ route('profile.trusted-devices') }}">
                    <x-secondary-button type="button">
                        {{ __('twofactor.trusted_devices.manage_button') }}
                    </x-secondary-button>
                </a>
            </div>
        </form>

{{-- Setup (QR Code) --}}
    @elseif ($pendingSecret)
        @php
            $google2fa = app(\PragmaRX\Google2FAQRCode\Google2FA::class);
            $qrInline = $google2fa->getQRCodeInline(
                config('app.name'),
                $user->email,
                $pendingSecret
            );
        @endphp

        <div class="mt-4 space-y-4">
            {{-- QR Code --}}
            <div>
                <p class="text-sm text-gray-700 dark:text-gray-300 mb-3">
                    {{ __('twofactor.scan_qr') }}
                </p>
                <div class="inline-block p-3 bg-white rounded shadow">
                    <img src="{{ $qrInline }}" alt="QR Code" class="w-64 h-64">
                </div>
            </div>

            {{-- Secret Manuale --}}
            <div>
                <p class="text-sm text-gray-700 dark:text-gray-300 mb-2">
                    {{ __('twofactor.secret_help') }}
                </p>
                <div class="font-mono text-sm bg-gray-100 dark:bg-gray-900 px-3 py-2 rounded break-all">
                    {{ $pendingSecret }}
                </div>
            </div>

            {{-- Form conferma --}}
            <form method="post" action="{{ route('two-factor.confirm') }}" class="space-y-4">
                @csrf

                <div>
                    <x-input-label for="one_time_password" :value="__('twofactor.otp_label')" />
                    <x-text-input
                        id="one_time_password"
                        name="one_time_password"
                        type="text"
                        inputmode="numeric"
                        autocomplete="one-time-code"
                        class="mt-1 block w-full"
                    />
                    <x-input-error :messages="$errors->get('one_time_password')" class="mt-2" />
                </div>

                <div class="flex gap-3">
                    <x-primary-button>
                        {{ __('twofactor.confirm_button') }}
                    </x-primary-button>

                    <x-secondary-button type="button" onclick="document.getElementById('two-factor-cancel-form').submit()">
                        {{ __('twofactor.cancel_setup') }}
                    </x-secondary-button>
                </div>
            </form>

            {{-- Form nascosto per annullare --}}
            <form id="two-factor-cancel-form" method="post" action="{{ route('two-factor.disable') }}" class="hidden">
                @csrf
                <input type="hidden" name="password" value="">
            </form>
        </div>

    {{-- Status 3: 2FA Disable --}}
    @else
        <p class="mt-4 text-sm text-gray-700 dark:text-gray-300">
            {{ __('twofactor.disabled') }}
        </p>

        <form method="post" action="{{ route('two-factor.enable') }}" class="mt-4">
            @csrf
            <x-primary-button>
                {{ __('twofactor.enable_button') }}
            </x-primary-button>
        </form>
    @endif

    {{-- Flash Messages --}}
    @if (session('status') === 'two-factor-enabled')
        <p class="mt-4 text-sm text-green-600 dark:text-green-400">
            {{ __('twofactor.flash_enabled') }}
        </p>
    @elseif (session('status') === 'two-factor-disabled')
        <p class="mt-4 text-sm text-green-600 dark:text-green-400">
            {{ __('twofactor.flash_disabled') }}
        </p>
    @elseif (session('status') === 'two-factor-pending')
        <p class="mt-4 text-sm text-blue-600 dark:text-blue-400">
            {{ __('twofactor.flash_pending') }}
        </p>
    @elseif (session('status') === 'two-factor-already-enabled')
        <p class="mt-4 text-sm text-yellow-600 dark:text-yellow-400">
            {{ __('twofactor.flash_already_enabled') }}
        </p>
    @endif


            {{-- Recovery Codes --}}
    @if (session('recovery_codes'))
        @php
            // NOTE: Manually forget recovery codes after reading them
            // because session()->put() in controller doesn't auto-expire.
            // This is a workaround for withFragment() breaking flash data.
            $codes = session('recovery_codes');
            session()->forget('recovery_codes');
        @endphp
    <div class="mt-6 p-4 bg-yellow-50 dark:bg-yellow-900/30 border border-yellow-200 dark:border-yellow-700 rounded-lg">
        <h3 class="text-lg font-medium text-yellow-900 dark:text-yellow-100 mb-2">
            {{ __('twofactor.recovery_codes_title') }}
        </h3>
        
        <p class="text-sm text-yellow-800 dark:text-yellow-200 mb-4">
            {{ __('twofactor.recovery_codes_help') }}
        </p>

        <div class="grid grid-cols-2 gap-2 font-mono text-sm bg-white dark:bg-gray-800 p-4 rounded">
            @foreach ($codes as $code)
                <div class="px-3 py-2 bg-gray-100 dark:bg-gray-700 rounded text-center">
                    {{ $code }}
                </div>
            @endforeach
        </div>

        <p class="mt-4 text-xs text-yellow-700 dark:text-yellow-300">
             {{ __('twofactor.recovery_codes_warning') }}
        </p>
    </div>
@endif
</section>