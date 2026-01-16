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

    {{-- Status: 2FA Enabled --}}
    @if ($hasConfirmed)
        @include('profile.partials.two-factor._enabled-status', ['user' => $user])

    {{-- Status: Setup in Progress (QR Code) --}}
    @elseif ($pendingSecret)
        @include('profile.partials.two-factor._setup-qr', ['user' => $user, 'secret' => $pendingSecret])

    {{-- Status: 2FA Disabled --}}
    @else
        @include('profile.partials.two-factor._disabled-status')
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

    {{-- Recovery Codes (shown after confirmation) --}}
    @if (session('recovery_codes'))
        @include('profile.partials.two-factor._recovery-codes', ['codes' => session('recovery_codes')])
        @php session()->forget('recovery_codes'); @endphp
    @endif
</section>