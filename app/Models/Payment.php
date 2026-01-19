<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Builder;

class Payment extends Model
{
    use HasFactory;

    protected $fillable = [
        'project_id',
        'amount',
        'currency',
        'paid_at',
        'due_date',
        'method',
        'reference',
        'notes',
        'invoice_number',
        'invoice_path',
    ];

    protected $casts = [
        'paid_at' => 'date',
        'due_date' => 'date',
        'amount' => 'decimal:2',
    ];

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

    public function project(): BelongsTo
    {
        return $this->belongsTo(Project::class);
    }

    /* -----------------------------------------------------------------
     |  SCOPES
     |-----------------------------------------------------------------*/

    public function scopeMethod(Builder $query, string $method): Builder
    {
        return $query->where('method', $method);
    }

    public function scopeCurrency(Builder $query, string $currency): Builder
    {
        return $query->where('currency', $currency);
    }

    public function scopeForProject(Builder $query, int $projectId): Builder
    {
        return $query->where('project_id', $projectId);
    }

    public function scopeThisMonth(Builder $query): Builder
    {
        return $query->whereBetween('paid_at', [
            now()->startOfMonth(),
            now()->endOfMonth()
        ]);
    }

    public function scopeThisYear(Builder $query): Builder
    {
        return $query->whereBetween('paid_at', [
            now()->startOfYear(),
            now()->endOfYear()
        ]);
    }

    public function scopeDateRange(Builder $query, $startDate, $endDate): Builder
    {
        return $query->whereBetween('paid_at', [$startDate, $endDate]);
    }

    /* -----------------------------------------------------------------
     |  HELPERS
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
    
    public function hasInvoice(): bool
    {
        return !is_null($this->invoice_number) && !is_null($this->invoice_path);
    }

    public function getInvoiceDownloadUrl(): ?string
    {
        if (!$this->hasInvoice()) {
            return null;
        }
        
        return route('invoices.download', $this);
    }

    public function getInvoicePreviewUrl(): ?string
    {
        if (!$this->hasInvoice()) {
            return null;
        }
        
        return route('invoices.preview', $this);
    }
}