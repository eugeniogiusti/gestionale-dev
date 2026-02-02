<?php

namespace App\Services\Invoices\Storage;

use Illuminate\Support\Facades\Storage;
use Illuminate\Http\UploadedFile;
use Symfony\Component\HttpFoundation\StreamedResponse;
use Symfony\Component\HttpFoundation\BinaryFileResponse;

class InvoiceStorageManager
{
    /**
     * Save uploaded file to storage
     */
    public function saveUploadedFile(UploadedFile $file): string
    {
        $this->ensureDirectoryExists();

        $filename = time() . '_' . $file->getClientOriginalName();
        $path = "invoices/{$filename}";

        Storage::putFileAs('invoices', $file, $filename);

        return $path;
    }

    /**
     * Download invoice file
     */
    public function download(string $path, string $downloadName = null): StreamedResponse
    {
        $filename = $downloadName ?? basename($path);
        return Storage::download($path, $filename);
    }

    /**
     * Preview invoice file
     */
    public function preview(string $path, string $displayName = null): BinaryFileResponse
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
     * Delete invoice file
     */
    public function delete(?string $path): void
    {
        if ($path && $this->exists($path)) {
            Storage::delete($path);
        }
    }

    /**
     * Check if invoice exists
     */
    public function exists(?string $path): bool
    {
        return $path && Storage::exists($path);
    }

    /**
     * Ensure invoices directory exists
     */
    private function ensureDirectoryExists(): void
    {
        if (!Storage::exists('invoices')) {
            Storage::makeDirectory('invoices');
        }
    }
}
