<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;

    /**
     * Mass assignable attributes
     */
    protected $fillable = [
        'project_id',
        'title',
        'description',
        'type',
        'status',
        'priority',
        'due_date',
        'order',
    ];

    /**
     * Casts
     */
    protected $casts = [
        'due_date' => 'date',
    ];

    /* -----------------------------------------------------------------
     |  CONSTANTS (single source of truth)
     |-----------------------------------------------------------------*/

    public const TYPES = [
        'feature',
        'bug',
        'infra',
        'refactor',
        'research',
    ];

    public const STATUSES = [
        'todo',
        'in_progress',
        'blocked',
        'done',
    ];

    public const PRIORITIES = [
        'low',
        'medium',
        'high',
    ];

    /* -----------------------------------------------------------------
     |  RELATIONSHIPS
     |-----------------------------------------------------------------*/

    public function project()
    {
        return $this->belongsTo(Project::class);
    }

    public function tasks()
    {
        return $this->hasMany(Task::class)->orderBy('order');
    }

    /* -----------------------------------------------------------------
     |  SCOPES (filters for queries)
     |-----------------------------------------------------------------*/

    public function scopeStatus($query, string $status)
    {
        return $query->where('status', $status);
    }

    public function scopeType($query, string $type)
    {
        return $query->where('type', $type);
    }

    public function scopePriority($query, string $priority)
    {
        return $query->where('priority', $priority);
    }

    public function scopeOverdue($query)
    {
        return $query->whereNotNull('due_date')
                     ->where('due_date', '<', now())
                     ->where('status', '!=', 'done');
    }

    public function scopeOpen($query)
    {
        return $query->whereIn('status', ['todo', 'in_progress', 'blocked']);
    }

    /* -----------------------------------------------------------------
     |  HELPERS (convenience methods)
     |-----------------------------------------------------------------*/

    public function isDone(): bool
    {
        return $this->status === 'done';
    }

    public function isBlocked(): bool
    {
        return $this->status === 'blocked';
    }

    public function isOverdue(): bool
    {
        return $this->due_date !== null
            && $this->due_date->isPast()
            && $this->status !== 'done';
    }


}