<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Str;

class Project extends Model
{
    use HasFactory, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'client_id',
        'name',
        'slug',
        'description',
        'status',
        'type',
        'priority',
        'repo_url',
        'staging_url',
        'production_url',
        'figma_url',
        'docs_url',
        'notes',
        'start_date',
        'due_date',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
        'deleted_at' => 'datetime',
        'start_date' => 'date',
        'due_date' => 'date',
    ];

        /**
     * Boot the model.
     */
    protected static function boot()
    {
        parent::boot();

        // Auto-generate slug on create
        static::creating(function ($project) {
            if (empty($project->slug)) {
                $project->slug = static::generateUniqueSlug($project->name);
            }
        });
    }

    /**
     * Generate unique slug
     */
    protected static function generateUniqueSlug($name, $ignoreId = null)
    {
        $slug = Str::slug($name);
        $originalSlug = $slug;
        $count = 1;
        
        while (static::where('slug', $slug)
            ->when($ignoreId, fn($q) => $q->where('id', '!=', $ignoreId))
            ->withTrashed()
            ->exists()) {
            $slug = $originalSlug . '-' . $count;
            $count++;
        }
        
        return $slug;
    }

    // ==========================================
    // RELATIONSHIPS
    // ==========================================
    /**
     * Relationship: Project belongs to Client
     */
    public function client()
    {
        return $this->belongsTo(Client::class);
    }
    
    /**
     * Relationship: Project has many Tasks
     */

    public function tasks()
    {
        return $this->hasMany(Task::class)->orderBy('order')->orderBy('created_at', 'desc');
    }

     /**
     * Relationship: Project has many Meetings
     */
    public function meetings()
    {
        return $this->hasMany(Meeting::class)->orderBy('scheduled_at', 'desc');
    }

    /**
     * Relationship: Project has many Payments
     */
    public function payments()
    {
        return $this->hasMany(Payment::class)->orderBy('paid_at', 'desc');
    }

    /**
     * Relationship: Project has many Costs
     */
    public function costs()
    {
        return $this->hasMany(Cost::class)->orderBy('paid_at', 'desc');
    }

    /**
     * Relationship: Project has many Documents
     */
    public function documents()
    {
        return $this->hasMany(Document::class);
    }

    // ==========================================
    // CUSTOM METHODS
    // ==========================================

    /**
     * Check if project is internal (no client)
     */
    public function isInternal(): bool
    {
        return $this->client_id === null;
    }

    /**
     * Get available status values
     */
    public static function getStatusValues(): array
    {
        return ['draft', 'in_progress', 'completed', 'archived'];
    }

    /**
     * Get available priority values
     */
    public static function getPriorityValues(): array
    {
        return ['low', 'medium', 'high'];
    }

    // ==========================================
    // SCOPES
    // ==========================================
    /**
     * Scope: Filter by status
     */
    public function scopeWithStatus($query, $status)
    {
        return $query->where('status', $status);
    }

    /**
     * Scope: Filter by client
     */
    public function scopeForClient($query, $clientId)
    {
        return $query->where('client_id', $clientId);
    }

    /**
     * Scope: Internal projects only
     */
    public function scopeInternal($query)
    {
        return $query->whereNull('client_id');
    }

    /**
     * Scope: Active projects (not archived)
     */
    public function scopeActive($query)
    {
        return $query->whereIn('status', ['draft', 'in_progress', 'completed']);
    }
}