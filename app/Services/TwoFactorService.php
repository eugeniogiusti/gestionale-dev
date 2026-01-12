<?php

namespace App\Services;

use App\Models\User;
use Illuminate\Support\Str;
use PragmaRX\Google2FA\Google2FA;

class TwoFactorService
{
    public function __construct(
        private Google2FA $google2fa
    ) {}

    /**
     * Generate new secret
     */
    public function generateSecret(): string
    {
        return $this->google2fa->generateSecretKey();
    }

    /**
     * Verify TOTP code
     */
    public function verifyCode(string $secret, string $code): bool
    {
        return $this->google2fa->verifyKey($secret, $code);
    }

    /**
     * Generate recovery codes
     */
    public function generateRecoveryCodes(int $count = 8): array
    {
        return collect(range(1, $count))
            ->map(fn() => Str::upper(Str::random(10)))
            ->toArray();
    }

    /**
     * Verify if code is valid (TOTP or recovery)
     */
    public function verifyCodeOrRecovery(User $user, string $code): bool
    {
        // Check TOTP
        if ($this->verifyCode($user->two_factor_secret, $code)) {
            return true;
        }

        // Check recovery code
        return in_array($code, $user->two_factor_recovery_codes ?? []);
    }

    /**
     * Use recovery code (remove it)
     */
    public function useRecoveryCode(User $user, string $code): void
    {
        $codes = $user->two_factor_recovery_codes;
        $codes = array_values(array_diff($codes, [$code]));
        
        $user->two_factor_recovery_codes = $codes;
        $user->save();
    }

    /**
     * Enable 2FA for user
     */
    public function enable(User $user, string $secret, array $recoveryCodes): void
    {
        $user->two_factor_secret = $secret;
        $user->two_factor_recovery_codes = $recoveryCodes;
        $user->two_factor_confirmed_at = now();
        $user->save();
    }

    /**
     * Disable 2FA for user
     */
    public function disable(User $user): void
    {
        $user->two_factor_secret = null;
        $user->two_factor_recovery_codes = null;
        $user->two_factor_confirmed_at = null;
        $user->save();

        // Delete all trusted devices
        $user->trustedDevices()->delete();
    }
}