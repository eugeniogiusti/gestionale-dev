<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use PragmaRX\Google2FA\Google2FA;
use App\Models\TrustedDevice;

class TwoFactorController extends Controller
{
    /**
     * Enable 2FA: Enbale secret and put it in session
     */
    public function enable(Request $request)
    {
        $user = $request->user();

        if ($user->two_factor_confirmed_at) {
            return back()->with('status', 'two-factor-already-enabled');
        }

        $google2fa = new Google2FA();
        $secret = $google2fa->generateSecretKey();

        $request->session()->put('2fa_secret', $secret);

        return back()->withFragment('two-factor')->with('status', 'two-factor-pending');    
    }

    /**
     * Confirm 2FA: verify code and save on DB
     */
    public function confirm(Request $request)
    {
        $user = $request->user();
        $secret = $request->session()->get('2fa_secret');

        if (!$secret) {
            return back()->withErrors([
                'one_time_password' => 'Nessun setup 2FA in corso.',
            ]);
        }

        $request->validate([
            'one_time_password' => ['required', 'string'],
        ]);

        $google2fa = new Google2FA();

        if (!$google2fa->verifyKey($secret, $request->input('one_time_password'))) {
            return back()->withErrors([
                'one_time_password' => 'Codice non valido.',
            ])->withInput();
        }

        // Make 8 recovery codes
        $codes = collect(range(1, 8))->map(fn() => Str::upper(Str::random(10)))->toArray();

        $user->two_factor_secret = $secret;
        $user->two_factor_recovery_codes = $codes;
        $user->two_factor_confirmed_at = now();
        $user->save();

        $request->session()->forget('2fa_secret');

        // NOTE: Using put() instead of with() because withFragment() causes
        // flash data to be lost during redirect. We manually forget() in the view.
        $request->session()->put('recovery_codes', $codes);
        $request->session()->put('status', 'two-factor-enabled');

        return back()->withFragment('two-factor');
        
    }

    
        /**
     * Disable 2FA completely
     */
    public function disable(Request $request)
    {
        $user = $request->user();

        // if we are in the middle of setup, just cancel it
        if (session('2fa_secret') && !$user->two_factor_confirmed_at) {
            $request->session()->forget('2fa_secret');
            return back()->withFragment('two-factor')->with('status', 'two-factor-setup-cancelled');
        }

            // Otherwise, disable 2FA after password confirmation
            // Manual check for password presence
            if (!$request->filled('password')) {
                return back()
                    ->withFragment('two-factor')
                    ->withErrors(['password' => 'La password è obbligatoria.']);
            }

            // Validation of current password with fragment handling
                try {
                    $request->validate([
                        'password' => ['current_password'],
                    ]);
                } catch (\Illuminate\Validation\ValidationException $e) {
                    throw $e->redirectTo(back()->withFragment('two-factor')->getTargetUrl());
                }

        $user->two_factor_secret = null;
        $user->two_factor_recovery_codes = null;
        $user->two_factor_confirmed_at = null;
        $user->save();

        // Delete all trusted devices
        $user->trustedDevices()->delete();

        $request->session()->forget(['2fa_secret', '2fa_verified_' . $user->id]);

        return back()->withFragment('two-factor')->with('status', 'two-factor-disabled');
    }

    /**
     * Show form 2fa code (when middleware intercepts)
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
     * Verify 2fa code at the login
     */
    public function verify(Request $request)
    {
        $request->validate([
            'one_time_password' => 'required|string',
            'remember_device' => 'boolean'
        ]);

        $user = auth()->user();
        $code = $request->input('one_time_password');
        $google2fa = new Google2FA();

        $isValid = false;

        // Verify if it's a TOTP code
        if ($google2fa->verifyKey($user->two_factor_secret, $code)) {
            $isValid = true;
        }
        // Or a recovery code
        elseif (in_array($code, $user->two_factor_recovery_codes ?? [])) {
            $isValid = true;
            
            // Remove recovery code used
            $codes = $user->two_factor_recovery_codes;
            $codes = array_values(array_diff($codes, [$code]));
            $user->two_factor_recovery_codes = $codes;
            $user->save();
        }

        if (!$isValid) {
            return back()->withErrors([
                'one_time_password' => 'Codice non valido o scaduto.'
            ]);
        }

        // Correct code ; mark as verified in session
        session(['2fa_verified_' . $user->id => true]);

        // If user wants to remember this device
        if ($request->boolean('remember_device')) {
            $this->addTrustedDevice($request, $user);
        }

        return redirect()->intended(route('dashboard'));
    }

    /**
     * Add trusted device
     */
    private function addTrustedDevice(Request $request, $user)
    {
        $deviceHash = TrustedDevice::generateDeviceHash($request);
        $deviceName = $this->getDeviceName($request);
        $ipAddress = $request->ip();

        $existing = TrustedDevice::where('user_id', $user->id)
                                ->where('device_hash', $deviceHash)
                                ->first();

        if (!$existing) {
            TrustedDevice::create([
                'user_id' => $user->id,
                'device_hash' => $deviceHash,
                'device_name' => $deviceName,
                'ip_address' => $ipAddress,
                'expires_at' => null,
            ]);
        }
    }

    /**
     * Generate a device name from User-Agent
     */
    private function getDeviceName(Request $request)
    {
        $userAgent = $request->userAgent();
        
        if (str_contains($userAgent, 'Chrome')) {
            $browser = 'Chrome';
        } elseif (str_contains($userAgent, 'Firefox')) {
            $browser = 'Firefox';
        } elseif (str_contains($userAgent, 'Safari')) {
            $browser = 'Safari';
        } else {
            $browser = 'Browser';
        }

        if (str_contains($userAgent, 'Windows')) {
            $os = 'Windows';
        } elseif (str_contains($userAgent, 'Mac')) {
            $os = 'Mac';
        } elseif (str_contains($userAgent, 'Linux')) {
            $os = 'Linux';
        } else {
            $os = 'Sistema';
        }

        return "$browser su $os";
    }


        /**
     * Show list of trusted devices
     */
    public function listDevices(Request $request)
    {
        $user = $request->user();
        
        // If 2FA not enabled, redirect to profile
        if (!$user->two_factor_confirmed_at) {
            return redirect()->route('profile.edit');
        }

        $devices = $user->trustedDevices()
        ->orderBy('created_at', 'desc')
        ->paginate(10);

        // Hash of current device
        $currentDeviceHash = TrustedDevice::generateDeviceHash($request);

        return view('profile.trusted-devices', compact('devices', 'currentDeviceHash'));
    }

    /**
     * Revoke a trusted device
     */
    public function revokeDevice(Request $request, $deviceId)
    {
        $user = $request->user();
        
        $device = $user->trustedDevices()->findOrFail($deviceId);
        $device->delete();

        return back()->with('status', 'device-revoked');
    }

    /**
     * Revoke all trusted devices
     */
    public function revokeAllDevices(Request $request)
    {
        $user = $request->user();
        
        $user->trustedDevices()->delete();
        
        // Clear 2FA verified session
        $request->session()->forget('2fa_verified_' . $user->id);

        return redirect()->route('profile.trusted-devices')->with('status', 'all-devices-revoked');
    }


}