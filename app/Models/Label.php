<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Label extends Model
{
    use HasFactory;

    /**
     * Mass assignable attributes
     */
    protected $fillable = [
        'name',
        'color',
    ];

    /* -----------------------------------------------------------------
     |  CONSTANTS
     |-----------------------------------------------------------------*/

    public const COLORS = [
        'blue' => '#3B82F6',
        'green' => '#10B981',
        'red' => '#EF4444',
        'yellow' => '#F59E0B',
        'purple' => '#8B5CF6',
        'pink' => '#EC4899',
        'indigo' => '#6366F1',
        'orange' => '#F97316',
    ];

    /* -----------------------------------------------------------------
     |  RELATIONSHIPS
     |-----------------------------------------------------------------*/

    public function documents()
    {
        return $this->belongsToMany(Document::class);
    }

    /* -----------------------------------------------------------------
     |  SCOPES
     |-----------------------------------------------------------------*/

    public function scopeOrdered($query)
    {
        return $query->orderBy('name');
    }

    /* -----------------------------------------------------------------
     |  HELPERS
     |-----------------------------------------------------------------*/

    public function getColorHexAttribute(): string
    {
        return self::COLORS[$this->color] ?? self::COLORS['blue'];
    }

    public function getDocumentsCountAttribute(): int
    {
        return $this->documents()->count();
    }
}