<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Quote extends Model
{
    /**
     * Mass assignable attributes
     */
    protected $fillable = [
        'project_id',
        'quote_date',
        'title',
        'items',
        'notes',
        'status',
    ];

    /**
     * Casts
     */
    protected $casts = [
        'items' => 'array',
        'quote_date' => 'date',
    ];

    /* -----------------------------------------------------------------
     |  RELATIONSHIPS
     |-----------------------------------------------------------------*/

    public function project()
    {
        return $this->belongsTo(Project::class);
    }

    public function client()
    {
        return $this->hasOneThrough(
            Client::class,
            Project::class,
            'id',
            'id',
            'project_id',
            'client_id'
        );
    }

    /* -----------------------------------------------------------------
     |  SCOPES
     |-----------------------------------------------------------------*/

    public function scopeForProject($query, int $projectId)
    {
        return $query->where('project_id', $projectId);
    }

    public function scopeByStatus($query, string $status)
    {
        return $query->where('status', $status);
    }

    public function scopeRecent($query)
    {
        return $query->latest('quote_date');
    }

    public function scopeSearch($query, string $search)
    {
        return $query->where('title', 'like', "%{$search}%");
    }

    /* -----------------------------------------------------------------
     |  HELPERS
     |-----------------------------------------------------------------*/

    /**
     * Calculate total from items
     */
    public function getTotal(): float
    {
        return collect($this->items)->sum('price');
    }

    /**
     * Get formatted total
     */
    public function getFormattedTotalAttribute(): string
    {
        return '€' . number_format($this->getTotal(), 2, ',', '.');
    }

    /**
     * Status checkers
     */
    public function isDraft(): bool
    {
        return $this->status === 'draft';
    }

    public function isSent(): bool
    {
        return $this->status === 'sent';
    }

    public function isAccepted(): bool
    {
        return $this->status === 'accepted';
    }

    public function isRejected(): bool
    {
        return $this->status === 'rejected';
    }

    public function isExpired(): bool
    {
        return $this->status === 'expired';
    }

    public function getStatusLabelAttribute(): string
    {
        return match($this->status) {
            'draft' => __('quotes.status_draft'),
            'sent' => __('quotes.status_sent'),
            'accepted' => __('quotes.status_accepted'),
            'rejected' => __('quotes.status_rejected'),
            'expired' => __('quotes.status_expired'),
            default => $this->status,
        };
    }

    public function getStatusColorAttribute(): string
    {
        return match($this->status) {
            'draft' => 'gray',
            'sent' => 'blue',
            'accepted' => 'green',
            'rejected' => 'red',
            'expired' => 'orange',
            default => 'gray',
        };
    }

    /**
     * Get download URL
     */
    public function getDownloadUrl(): string
    {
        return route('quotes.download', [$this->project, $this]);
    }

    /**
     * Get delete URL
     */
    public function getDeleteUrl(): string
    {
        return route('quotes.destroy', [$this->project, $this]);
    }
}