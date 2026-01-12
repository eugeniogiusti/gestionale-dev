<?php

namespace App\Http\Controllers;

use App\Http\Requests\ConfirmTwoFactorRequest;
use App\Http\Requests\VerifyTwoFactorRequest;
use App\Http\Requests\DisableTwoFactorRequest;
use App\Services\TwoFactorService;
use App\Services\TrustedDeviceService;
use App\Queries\TrustedDeviceQuery;
use Illuminate\Http\Request;

class TwoFactorController extends Controller
{
    public function __construct(
        private TwoFactorService $twoFactorService,
        private TrustedDeviceService $trustedDeviceService
    ) {}

    /**
     * Enable 2FA
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
     * Confirm 2FA
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
        $request->session()->forget(['2fa_secret', '2fa_verified_' . $user->id]);

        return back()->withFragment('two-factor')->with('status', 'two-factor-disabled');
    }

    /**
     * Show 2FA challenge
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
     * Verify 2FA code
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

        // If recovery code, remove it
        if (in_array($code, $user->two_factor_recovery_codes ?? [])) {
            $this->twoFactorService->useRecoveryCode($user, $code);
        }

        session(['2fa_verified_' . $user->id => true]);

        if ($request->boolean('remember_device')) {
            $this->trustedDeviceService->addDevice($request, $user);
        }

        return redirect()->intended(route('dashboard'));
    }

    /**
     * List trusted devices
     */
    public function listDevices(Request $request)
    {
        $user = $request->user();

        if (!$user->two_factor_confirmed_at) {
            return redirect()->route('profile.edit');
        }

        $query = new TrustedDeviceQuery($user->id);
        $devices = $query->handle();
        $currentDeviceHash = $this->trustedDeviceService->generateDeviceHash($request);

        return view('profile.trusted-devices', compact('devices', 'currentDeviceHash'));
    }

    /**
     * Revoke device
     */
    public function revokeDevice(Request $request, $deviceId)
    {
        $user = $request->user();
        $device = $user->trustedDevices()->findOrFail($deviceId);
        $device->delete();

        return back()->with('status', 'device-revoked');
    }

    /**
     * Revoke all devices
     */
    public function revokeAllDevices(Request $request)
    {
        $user = $request->user();
        $user->trustedDevices()->delete();
        $request->session()->forget('2fa_verified_' . $user->id);

        return redirect()->route('profile.trusted-devices')->with('status', 'all-devices-revoked');
    }
}