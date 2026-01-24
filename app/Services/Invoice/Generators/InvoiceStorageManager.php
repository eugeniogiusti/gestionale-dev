<?php

namespace App\Services\Invoices\Generators;

use Illuminate\Support\Facades\Storage;
use Symfony\Component\HttpFoundation\StreamedResponse;
use Symfony\Component\HttpFoundation\BinaryFileResponse;

class InvoiceStorageManager
{
    /**
     * Save PDF to storage
     */
    public function save($pdf, string $invoiceNumber): string
    {
        $filename = $this->formatFilename($invoiceNumber);
        $path = "invoices/{$filename}";
        
        $this->ensureDirectoryExists();
        
        Storage::put($path, $pdf->output());
        
        return $path;
    }

    /**
     * Download invoice file
     */
    public function download(string $path, string $invoiceNumber): StreamedResponse
    {
        $filename = $this->formatFilename($invoiceNumber);
        return Storage::download($path, "Fattura-{$filename}");
    }

    /**
     * Preview invoice file
     */
    public function preview(string $path, string $invoiceNumber): BinaryFileResponse
    {
        $filename = $this->formatFilename($invoiceNumber);
        
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

    /**
     * Format filename
     */
    private function formatFilename(string $invoiceNumber): string
    {
        return str_replace('/', '-', $invoiceNumber) . '.pdf';
    }
}