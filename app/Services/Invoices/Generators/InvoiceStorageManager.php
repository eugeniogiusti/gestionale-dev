<?php

namespace App\Services\Invoices\Generators;

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
    public function download(string $path): StreamedResponse
    {
        $filename = basename($path);
        return Storage::download($path, "Fattura-{$filename}");
    }

    /**
     * Preview invoice file
     */
    public function preview(string $path): BinaryFileResponse
    {
        $filename = basename($path);
        
        return response()->file(
            Storage::path($path),
            [
                'Content-Type' => 'application/pdf',
                'Content-Disposition' => 'inline; filename="Fattura-' . $filename . '"'
            ]
        );
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