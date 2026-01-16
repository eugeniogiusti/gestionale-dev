<?php

namespace App\Http\Controllers;

use App\Queries\TrustedDeviceQuery;
use App\Services\TrustedDeviceService;
use Illuminate\Http\Request;

class TrustedDeviceController extends Controller
{
    public function __construct(
        private TrustedDeviceService $trustedDeviceService
    ) {}

    /**
     * List all trusted devices for current user
     */
    public function index(Request $request)
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
     * Revoke a single trusted device
     */
    public function revoke(Request $request, int $deviceId)
    {
        $user = $request->user();
        $device = $user->trustedDevices()->findOrFail($deviceId);
        $device->delete();

        return back()->with('status', 'device-revoked');
    }

    /**
     * Revoke all trusted devices
     */
    public function revokeAll(Request $request)
    {
        $user = $request->user();
        $user->trustedDevices()->delete();
        $request->session()->forget('2fa_verified_' . $user->id);

        return redirect()->route('profile.trusted-devices')->with('status', 'all-devices-revoked');
    }
}