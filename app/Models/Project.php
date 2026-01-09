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
        'priority',
        'repo_url',
        'staging_url',
        'production_url',
        'figma_url',
        'docs_url',
        'notes',
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
    ];

    /**
     * Boot the model.
     */
    protected static function boot()
    {
        parent::boot();

        // Auto-generate slug from name
        static::creating(function ($project) {
            if (empty($project->slug)) {
                $project->slug = Str::slug($project->name);
                
                // Ensure unique slug
                $originalSlug = $project->slug;
                $count = 1;
                while (static::where('slug', $project->slug)->exists()) {
                    $project->slug = $originalSlug . '-' . $count++;
                }
            }
        });
    }

    /**
     * Relationship: Project belongs to Client
     */
    public function client()
    {
        return $this->belongsTo(Client::class);
    }

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