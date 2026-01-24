<?php

namespace App\Queries\TwoFactor;

use App\Models\TrustedDevice;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

class TrustedDeviceQuery
{
    public function __construct(
        private int $userId
    ) {}

    public function handle(): LengthAwarePaginator
    {
        return TrustedDevice::where('user_id', $this->userId)
            ->orderBy('created_at', 'desc')
            ->paginate(10);
    }

    public function getCurrentDevice($deviceHash): ?TrustedDevice
    {
        return TrustedDevice::where('user_id', $this->userId)
            ->where('device_hash', $deviceHash)
            ->first();
    }
}