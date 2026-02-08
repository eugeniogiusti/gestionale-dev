<?php

namespace App\Services\Receipts\Storage;

use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Symfony\Component\HttpFoundation\BinaryFileResponse;
use Symfony\Component\HttpFoundation\StreamedResponse;

/**
 * Low-level file storage operations for receipt attachments.
 *
 * Handles saving, downloading, inline previewing, deleting, and
 * existence-checking of receipt files in `storage/app/receipts/`.
 * Supports PDF, JPEG, and PNG files. Mirrors the same pattern
 * used by InvoiceStorageManager.
 *
 * @see \App\Services\Invoices\Storage\InvoiceStorageManager
 */
class ReceiptStorageManager
{
    /**
     * Save uploaded file to storage
     */
    public function saveUploadedFile(UploadedFile $file, string $filename): string
    {
        $this->ensureDirectoryExists();

        return $file->storeAs('receipts', $filename, 'local');
    }

    /**
     * Download receipt file
     */
    public function download(string $path, ?string $downloadName = null): StreamedResponse
    {
        $filename = $downloadName ?? basename($path);

        return Storage::download($path, $filename);
    }

    /**
     * Preview receipt file
     */
    public function preview(string $path, ?string $displayName = null): BinaryFileResponse
    {
        $filename = $displayName ?? basename($path);
        $mimeType = $this->getMimeType($path);

        return response()->file(
            Storage::path($path),
            [
                'Content-Type' => $mimeType,
                'Content-Disposition' => 'inline; filename="' . $filename . '"',
                'X-Content-Type-Options' => 'nosniff',
                'Cache-Control' => 'private, no-store',
            ]
        );
    }

    /**
     * Get MIME type from file extension
     */
    private function getMimeType(string $path): string
    {
        $extension = strtolower(pathinfo($path, PATHINFO_EXTENSION));

        return match ($extension) {
            'pdf' => 'application/pdf',
            'jpg', 'jpeg' => 'image/jpeg',
            'png' => 'image/png',
            default => 'application/octet-stream',
        };
    }

    /**
     * Delete receipt file
     */
    public function delete(?string $path): void
    {
        if ($path && $this->exists($path)) {
            Storage::delete($path);
        }
    }

    /**
     * Check if receipt exists
     */
    public function exists(?string $path): bool
    {
        return $path && Storage::exists($path);
    }

    /**
     * Ensure receipts directory exists
     */
    private function ensureDirectoryExists(): void
    {
        if (!Storage::exists('receipts')) {
            Storage::makeDirectory('receipts');
        }
    }
}
