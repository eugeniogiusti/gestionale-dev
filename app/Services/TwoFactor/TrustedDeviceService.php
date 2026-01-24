<?php

namespace App\Services\TwoFactor;

use App\Models\User;
use App\Models\TrustedDevice;
use Illuminate\Http\Request;

class TrustedDeviceService
{
    /**
     * Generate device hash
     */
    public function generateDeviceHash(Request $request): string
    {
        return TrustedDevice::generateDeviceHash($request);
    }

    /**
     * Add trusted device
     */
    public function addDevice(Request $request, User $user): void
    {
        $deviceHash = $this->generateDeviceHash($request);
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
     * Get device name from User-Agent
     */
    private function getDeviceName(Request $request): string
    {
        $userAgent = $request->userAgent();

        $browser = match (true) {
            str_contains($userAgent, 'Chrome') => 'Chrome',
            str_contains($userAgent, 'Firefox') => 'Firefox',
            str_contains($userAgent, 'Safari') => 'Safari',
            default => 'Browser',
        };

        $os = match (true) {
            str_contains($userAgent, 'Windows') => 'Windows',
            str_contains($userAgent, 'Mac') => 'Mac',
            str_contains($userAgent, 'Linux') => 'Linux',
            default => 'Sistema',
        };

        return "$browser su $os";
    }
}