<?php

namespace App\Http\Controllers\TwoFactor;

use App\Http\Controllers\Controller;
use App\Http\Requests\TwoFactor\ConfirmTwoFactorRequest;
use App\Http\Requests\TwoFactor\DisableTwoFactorRequest;
use App\Services\TwoFactor\TwoFactorService;

class TwoFactorSetupController extends Controller
{
    public function __construct(
        private TwoFactorService $twoFactorService
    ) {}

    /**
     * Enable 2FA - Start setup process
     */
    public function enable(Request $request)
    {
        $user = $request->user();

        if ($user->two_factor_confirmed_at) {
            return back()->with('status', 'two-factor-already-enabled');
        }

        $secret = $this->twoFactorService->generateSecret();
        $request->session()->put('2fa_secret', $secret);

        return back()->withFragment('two-factor')->with('status', 'two-factor-pending');
    }

    /**
     * Confirm 2FA with OTP code
     */
    public function confirm(ConfirmTwoFactorRequest $request)
    {
        $user = $request->user();
        $secret = $request->session()->get('2fa_secret');

        if (!$secret) {
            return back()->withErrors([
                'one_time_password' => __('two_factor.no_setup_in_progress'),
            ]);
        }

        if (!$this->twoFactorService->verifyCode($secret, $request->input('one_time_password'))) {
            return back()->withErrors([
                'one_time_password' => __('two_factor.invalid_code'),
            ])->withInput();
        }

        $recoveryCodes = $this->twoFactorService->generateRecoveryCodes();
        $this->twoFactorService->enable($user, $secret, $recoveryCodes);

        $request->session()->forget('2fa_secret');
        $request->session()->put('recovery_codes', $recoveryCodes);
        $request->session()->put('status', 'two-factor-enabled');
        $request->session()->put('2fa_verified_' . $user->id, true);

        return back()->withFragment('two-factor');
    }

    /**
     * Cancel 2FA setup (no password required)
     */
    public function cancel(Request $request)
    {
        $request->session()->forget('2fa_secret');
        
        return back()->withFragment('two-factor')->with('status', 'two-factor-setup-cancelled');
    }

    /**
     * Disable 2FA (password required)
     */
    public function disable(DisableTwoFactorRequest $request)
    {
        $user = $request->user();

        $this->twoFactorService->disable($user);
        
        // Pulisci TUTTO relativo a 2FA per questo user
        $request->session()->forget([
            '2fa_secret', 
            '2fa_verified_' . $user->id
        ]);

        return back()->withFragment('two-factor')->with('status', 'two-factor-disabled');
    }
}