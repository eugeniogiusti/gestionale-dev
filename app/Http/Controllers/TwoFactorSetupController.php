<?php

namespace App\Http\Controllers;

use App\Http\Requests\ConfirmTwoFactorRequest;
use App\Http\Requests\DisableTwoFactorRequest;
use App\Services\TwoFactorService;
use Illuminate\Http\Request;

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
     * Disable 2FA
     */
        public function disable(DisableTwoFactorRequest $request)
    {
        $user = $request->user();

        // Cancel setup if in progress
        if (session('2fa_secret') && !$user->two_factor_confirmed_at) {
            $request->session()->forget('2fa_secret');
            return back()->withFragment('two-factor')->with('status', 'two-factor-setup-cancelled');
        }

        $this->twoFactorService->disable($user);
        
        // Pulisci TUTTO relativo a 2FA per questo user
        $request->session()->forget([
            '2fa_secret', 
            '2fa_verified_' . $user->id
        ]);

        return back()->withFragment('two-factor')->with('status', 'two-factor-disabled');
    }
    
}