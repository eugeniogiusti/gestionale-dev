<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Services\TrustedDeviceService;
use Symfony\Component\HttpFoundation\Response;

class EnsureTwoFactorAuthenticated
{
    public function __construct(
        private TrustedDeviceService $trustedDeviceService
    ) {}

    public function handle(Request $request, Closure $next): Response
    {
        $user = auth()->user();

        // if user is not authenticated, pass through
        if (!$user) {
            return $next($request);
        }

        // if 2FA disable for this user, pass through
        if (!$user->two_factor_confirmed_at) {
            return $next($request);
        }

        // Generate device hash via service
        $deviceHash = $this->trustedDeviceService->generateDeviceHash($request);

        // if device is trusted, pass through
        if ($user->hasValidTrustedDevice($deviceHash)) {
            return $next($request);
        }

        // if the user has already verified 2FA in this session, pass through
        if (session('2fa_verified_' . $user->id)) {
            return $next($request);
        }

        // if we are already on a 2FA route, allow the request to proceed
        if ($request->routeIs('2fa.*')) {
            return $next($request);
        }

        // Redirect to 2FA verification page
        return redirect()->route('2fa.show');
    }
}