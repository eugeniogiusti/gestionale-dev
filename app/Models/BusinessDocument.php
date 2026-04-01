<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

/**
 * Represents a personal/business document belonging to the owner (not tied to a project).
 *
 * Examples: Certificato apertura Partita IVA, variazioni ATECO, visure, etc.
 * Files are stored in storage/app/business-documents/.
 */
class BusinessDocument extends Model
{
    protected $table = 'business_documents';

    protected $fillable = [
        'name',
        'file_path',
        'notes',
        'uploaded_at',
    ];

    protected $casts = [
        'uploaded_at' => 'datetime',
    ];

    /* -----------------------------------------------------------------
     |  HELPERS
     |-----------------------------------------------------------------*/

    public function getFileSizeAttribute(): ?string
    {
        if (!$this->file_path || !Storage::exists($this->file_path)) {
            return null;
        }

        $bytes = Storage::size($this->file_path);

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

    public function getDownloadUrl(): string
    {
        return route('settings.business-documents.download', $this);
    }

    public function getPreviewUrl(): string
    {
        return route('settings.business-documents.preview', $this);
    }
}
