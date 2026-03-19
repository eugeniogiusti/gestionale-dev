<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TaskDocument extends Model
{
    use HasFactory;

    /**
     * Attributi mass assignable
     */
    protected $fillable = [
        'task_id',
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

    public function task()
    {
        return $this->belongsTo(Task::class);
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

    /**
     * URL for download
     */
    public function getDownloadUrl(): string
    {
        return route('task-documents.download', [$this->task->project, $this->task, $this]);
    }

    /**
     * URL for inline preview
     */
    public function getPreviewUrl(): string
    {
        return route('task-documents.preview', [$this->task->project, $this->task, $this]);
    }

    /**
     * URL for deletion
     */
    public function getDeleteUrl(): string
    {
        return route('task-documents.destroy', [$this->task->project, $this->task, $this]);
    }
}
