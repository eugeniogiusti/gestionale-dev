@php
    $google2fa = app(\PragmaRX\Google2FAQRCode\Google2FA::class);
    $qrInline = $google2fa->getQRCodeInline(
        config('app.name'),
        $user->email,
        $secret
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

    {{-- Manual Secret --}}
    <div>
        <p class="text-sm text-gray-700 dark:text-gray-300 mb-2">
            {{ __('twofactor.secret_help') }}
        </p>
        <div class="font-mono text-sm bg-gray-100 dark:bg-gray-900 px-3 py-2 rounded break-all">
            {{ $secret }}
        </div>
    </div>

    {{-- Confirmation Form --}}
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

    {{-- Hidden Cancel Form --}}
    <form id="two-factor-cancel-form" method="post" action="{{ route('two-factor.disable') }}" class="hidden">
        @csrf
        @method('DELETE')
        <input type="hidden" name="password" value="">
    </form>
</div>