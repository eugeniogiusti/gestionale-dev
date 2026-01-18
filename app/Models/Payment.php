<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;

    /**
     * Mass assignable attributes
     */
    protected $fillable = [
        'project_id',
        'amount',
        'currency',
        'paid_at',
        'method',
        'reference',
        'notes',
    ];

    /**
     * Casts
     */
    protected $casts = [
        'paid_at' => 'date',
        'amount' => 'decimal:2',
    ];

    /* -----------------------------------------------------------------
     |  CONSTANTS (single source of truth)
     |-----------------------------------------------------------------*/

    public const METHODS = [
        'cash',
        'bank',
        'stripe',
        'paypal',
    ];

    public const CURRENCIES = [
        'EUR' => '€',
        'USD' => '$',
        'GBP' => '£',
        'CHF' => 'CHF',
        'JPY' => '¥',
    ];

    /* -----------------------------------------------------------------
     |  RELATIONSHIPS
     |-----------------------------------------------------------------*/

    public function project()
    {
        return $this->belongsTo(Project::class);
    }

    /* -----------------------------------------------------------------
     |  SCOPES (filters for queries)
     |-----------------------------------------------------------------*/

    public function scopeMethod($query, string $method)
    {
        return $query->where('method', $method);
    }

    public function scopeCurrency($query, string $currency)
    {
        return $query->where('currency', $currency);
    }

    public function scopeForProject($query, int $projectId)
    {
        return $query->where('project_id', $projectId);
    }

    public function scopeThisMonth($query)
    {
        return $query->whereBetween('paid_at', [
            now()->startOfMonth(),
            now()->endOfMonth()
        ]);
    }

    public function scopeThisYear($query)
    {
        return $query->whereBetween('paid_at', [
            now()->startOfYear(),
            now()->endOfYear()
        ]);
    }

    public function scopeDateRange($query, $startDate, $endDate)
    {
        return $query->whereBetween('paid_at', [$startDate, $endDate]);
    }

    /* -----------------------------------------------------------------
     |  HELPERS (convenience methods)
     |-----------------------------------------------------------------*/

    public function getCurrencySymbol(): string
    {
        return self::CURRENCIES[$this->currency] ?? $this->currency;
    }

    public function getFormattedAmount(): string
    {
        $symbol = $this->getCurrencySymbol();
        $formatted = number_format($this->amount, 2, ',', '.');
        
        return "{$symbol} {$formatted}";
    }

    public function isRecent(): bool
    {
        return $this->paid_at->isAfter(now()->subDays(7));
    }
}