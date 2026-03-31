<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class BusinessSettings extends Model
{
    protected $table = 'business_settings';

    public const CURRENCIES = [
        'EUR' => '€',
        'USD' => '$',
        'GBP' => '£',
        'CHF' => 'CHF',
        'JPY' => '¥',
        'CNY' => '¥',
        'INR' => '₹',
        'PKR' => '₨',
        'AUD' => 'A$',
        'DKK' => 'kr',
        'PLN' => 'zł',
        'BRL' => 'R$',
        'RUB' => '₽',
        'RON' => 'lei',
        'UAH' => '₴',
        'PEN' => 'S/',
    ];

    protected $fillable = [
        'owner_first_name',
        'owner_last_name',
        'legal_address',
        'legal_city',
        'legal_zip',
        'legal_province',
        'legal_country',
        'tax_id',
        'vat_number',
        'iban',
        'default_currency',
        'email',
        'certified_email',
        'phone_prefix',
        'phone',
        'business_name',
        'business_description',
        'website',
        'logo_path',
        'github_pat',
        'billing_tool_url',
    ];

    /**
     * Cached singleton instance (one query per request)
     */
    protected static ?self $cachedInstance = null;

    /**
     * Get the singleton instance
     */
    public static function current(): self
    {
        return static::$cachedInstance ??= static::firstOrCreate(['id' => 1]);
    }

    /**
     * Get logo URL (from private storage)
     */
    public function getLogoUrlAttribute(): ?string
    {
        if (!$this->logo_path) {
        return null;
    }

    // Generate temporary URL (valid for 5 minutes)
    return Storage::disk('local')->temporaryUrl(
        $this->logo_path,
        now()->addMinutes(5)
        );
    }

    /**
     * Get full owner name
     */
    public function getOwnerFullNameAttribute(): string
    {
        return trim("{$this->owner_first_name} {$this->owner_last_name}");
    }

    /**
     * Get formatted address
     */
    public function getFormattedAddressAttribute(): string
    {
        $parts = array_filter([
            $this->legal_address,
            $this->legal_zip,
            $this->legal_city,
            $this->legal_province,
            $this->legal_country,
        ]);

        return implode(', ', $parts);
    }
}
