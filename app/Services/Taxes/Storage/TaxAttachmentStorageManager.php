<?php

namespace App\Services\Taxes\Storage;

use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Symfony\Component\HttpFoundation\BinaryFileResponse;
use Symfony\Component\HttpFoundation\StreamedResponse;

class TaxAttachmentStorageManager
{
    public function saveUploadedFile(UploadedFile $file, string $filename): string
    {
        $this->ensureDirectoryExists();

        return $file->storeAs('taxes', $filename, 'local');
    }

    public function download(string $path, ?string $downloadName = null): StreamedResponse
    {
        $filename = $downloadName ?? basename($path);

        return Storage::download($path, $filename);
    }

    public function preview(string $path, ?string $displayName = null): BinaryFileResponse
    {
        $filename = $displayName ?? basename($path);
        $mimeType = $this->getMimeType($path);

        return response()->file(
            Storage::path($path),
            [
                'Content-Type'           => $mimeType,
                'Content-Disposition'    => 'inline; filename="' . $filename . '"',
                'X-Content-Type-Options' => 'nosniff',
                'Cache-Control'          => 'private, no-store',
            ]
        );
    }

    public function delete(?string $path): void
    {
        if ($path && $this->exists($path)) {
            Storage::delete($path);
        }
    }

    public function exists(?string $path): bool
    {
        return $path && Storage::exists($path);
    }

    private function getMimeType(string $path): string
    {
        $extension = strtolower(pathinfo($path, PATHINFO_EXTENSION));

        return match ($extension) {
            'pdf'        => 'application/pdf',
            'jpg', 'jpeg' => 'image/jpeg',
            'png'        => 'image/png',
            default      => 'application/octet-stream',
        };
    }

    private function ensureDirectoryExists(): void
    {
        if (!Storage::exists('taxes')) {
            Storage::makeDirectory('taxes');
        }
    }
}
