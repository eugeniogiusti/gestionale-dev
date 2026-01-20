<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Document extends Model
{
    use HasFactory;

    /**
     * Mass assignable attributes
     */
    protected $fillable = [
        'project_id',
        'name',
        'file_path',
        'uploaded_at',
        'notes',
    ];

    /**
     * Casts
     */
    protected $casts = [
        'uploaded_at' => 'datetime',
    ];

    /* -----------------------------------------------------------------
     |  RELATIONSHIPS
     |-----------------------------------------------------------------*/

    public function project()
    {
        return $this->belongsTo(Project::class);
    }

    public function labels()
    {
        return $this->belongsToMany(Label::class);
    }

    /* -----------------------------------------------------------------
     |  SCOPES
     |-----------------------------------------------------------------*/

    public function scopeForProject($query, int $projectId)
    {
        return $query->where('project_id', $projectId);
    }

    public function scopeWithLabel($query, int $labelId)
    {
        return $query->whereHas('labels', function($q) use ($labelId) {
            $q->where('labels.id', $labelId);
        });
    }

    public function scopeSearch($query, string $search)
    {
        return $query->where('name', 'like', "%{$search}%");
    }

    public function scopeRecent($query)
    {
        return $query->latest('uploaded_at');
    }

    /* -----------------------------------------------------------------
     |  HELPERS
     |-----------------------------------------------------------------*/

    public function getFileSizeAttribute(): ?string
    {
        if (!$this->file_path) {
            return null;
        }

        $bytes = \Storage::size($this->file_path);
        
        if ($bytes >= 1048576) {
            return round($bytes / 1048576, 2) . ' MB';
        } elseif ($bytes >= 1024) {
            return round($bytes / 1024, 2) . ' KB';
        }
        
        return $bytes . ' B';
    }

    public function getFileExtensionAttribute(): string
    {
        return pathinfo($this->file_path, PATHINFO_EXTENSION);
    }

    public function hasLabel(int $labelId): bool
    {
        return $this->labels->contains($labelId);
    }

    /**
 * Get download URL
 */
public function getDownloadUrl(): string
{
    return route('documents.download', [$this->project, $this]);
}

    /**
     * Get preview URL
     */
    public function getPreviewUrl(): string
    {
        return route('documents.preview', [$this->project, $this]);
    }

    /**
     * Get delete URL
     */
    public function getDeleteUrl(): string
    {
        return route('documents.destroy', [$this->project, $this]);
    }

    /**
     * Get update URL
     */
    public function getUpdateUrl(): string
    {
        return route('documents.update', [$this->project, $this]);
    }
    
}