<?php

namespace App\Http\Controllers;

use App\Http\Requests\VerifyTwoFactorRequest;
use App\Services\TwoFactorService;
use App\Services\TrustedDeviceService;
use Illuminate\Http\Request;

class TwoFactorChallengeController extends Controller
{
    public function __construct(
        private TwoFactorService $twoFactorService,
        private TrustedDeviceService $trustedDeviceService
    ) {}

    /**
     * Show 2FA challenge page
     */
    public function show()
    {
        $user = auth()->user();

        if (!$user->two_factor_confirmed_at) {
            return redirect()->route('dashboard');
        }

        return view('auth.two-factor-challenge');
    }

    /**
     * Verify 2FA code (OTP or recovery code)
     */
    public function verify(VerifyTwoFactorRequest $request)
    {
        $user = auth()->user();
        $code = $request->input('one_time_password');

        if (!$this->twoFactorService->verifyCodeOrRecovery($user, $code)) {
            return back()->withErrors([
                'one_time_password' => __('two_factor.invalid_or_expired'),
            ]);
        }

        // If recovery code was used, remove it
        if (in_array($code, $user->two_factor_recovery_codes ?? [])) {
            $this->twoFactorService->useRecoveryCode($user, $code);
        }

        session(['2fa_verified_' . $user->id => true]);

        // Save device as trusted if requested
        if ($request->boolean('remember_device')) {
            $this->trustedDeviceService->addDevice($request, $user);
        }

        return redirect()->intended(route('dashboard'));
    }
}