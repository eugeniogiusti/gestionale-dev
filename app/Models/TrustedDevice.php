<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class TrustedDevice extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'device_hash',
        'device_name',
        'ip_address',
        'created_at', 
        'expires_at'
    ];

    protected $casts = [
        'expires_at' => 'datetime',
        'created_at' => 'datetime',
    ];

    const UPDATED_AT = null;

    // Relazione con User
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Check se device è ancora valido
    public function isValid()
    {
        return $this->expires_at === null || $this->expires_at->isFuture();
    }

    // Genera hash unico per device (user agent + IP)
    public static function generateDeviceHash($request)
    {
        $userAgent = $request->userAgent();
        $ip = $request->ip();
        $deviceData = $userAgent . '|' . $ip;
        
        return hash('sha256', $deviceData);
    }
}