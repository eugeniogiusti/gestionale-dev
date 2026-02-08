<?php

namespace App\Http\Middleware\TwoFactor;

use Closure;
use Illuminate\Http\Request;
use App\Services\TwoFactor\TrustedDeviceService;
use Symfony\Component\HttpFoundation\Response;

class EnsureTwoFactorAuthenticated
{
    public function __construct(
        private TrustedDeviceService $trustedDeviceService
    ) {}

    public function handle(Request $request, Closure $next): Response
    {
        $user = auth()->user();

        // If user is not authenticated, pass through
        if (!$user) {
            return $next($request);
        }

        // If 2FA is not enabled/confirmed for this user, pass through
        if (!$user->two_factor_confirmed_at) {
            return $next($request);
        }

        // If we are already on a 2FA challenge route, allow the request to proceed (avoid loops)
        if ($request->routeIs('2fa.*')) {
            return $next($request);
        }

        // Generate device hash via service
        $deviceHash = $this->trustedDeviceService->generateDeviceHash($request);

        // If device is trusted, pass through
        if ($user->hasValidTrustedDevice($deviceHash)) {
            return $next($request);
        }

        // If the user has already verified 2FA in this session, pass through
        if (session('2fa_verified_' . $user->id)) {
            return $next($request);
        }

        // If this is an API/AJAX request expecting JSON, return JSON instead of an HTML redirect
        if ($request->expectsJson()) {
            return response()->json([
                'message'  => 'Two-factor authentication required.',
                'redirect' => route('2fa.show'),
            ], 423);
        }

        // Otherwise, redirect to the 2FA verification page
        return redirect()->route('2fa.show');
    }
}