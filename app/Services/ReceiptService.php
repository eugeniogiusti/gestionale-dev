<?php

namespace App\Services;

use App\Models\Cost;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Symfony\Component\HttpFoundation\BinaryFileResponse;
use Symfony\Component\HttpFoundation\StreamedResponse;

class ReceiptService
{
    /**
     * Upload receipt for cost
     */
    public function upload(Cost $cost, UploadedFile $file): void
    {
        // Elimina vecchia ricevuta se esiste
        if ($cost->receipt_path && Storage::exists($cost->receipt_path)) {
            Storage::delete($cost->receipt_path);
        }

        // Salva nuova ricevuta
        $filename = $this->generateFilename($cost, $file);
        $path = $file->storeAs('receipts', $filename, 'local');
        
        $cost->update(['receipt_path' => $path]);
    }

    /**
     * Download receipt
     */
    public function download(Cost $cost): StreamedResponse
    {
        if (!$this->exists($cost)) {
            abort(404, 'Receipt not found');
        }

        $filename = basename($cost->receipt_path);

        return Storage::download($cost->receipt_path, $filename);
    }

    /**
     * Preview receipt
     */
    public function preview(Cost $cost): BinaryFileResponse
    {
        if (!$this->exists($cost)) {
            abort(404, 'Receipt not found');
        }

        return response()->file(Storage::path($cost->receipt_path));
    }

    /**
     * Delete receipt
     */
    public function delete(Cost $cost): void
    {
        if ($cost->receipt_path && Storage::exists($cost->receipt_path)) {
            Storage::delete($cost->receipt_path);
        }

        $cost->update(['receipt_path' => null]);
    }

    /**
     * Check if receipt exists
     */
    private function exists(Cost $cost): bool
    {
        return $cost->receipt_path && Storage::exists($cost->receipt_path);
    }

    /**
     * Generate unique filename for receipt
     */
    private function generateFilename(Cost $cost, UploadedFile $file): string
    {
        $date = $cost->paid_at->format('Y-m-d');
        $type = $cost->type;
        $extension = $file->getClientOriginalExtension();
        
        return "ricevuta-{$type}-{$date}-" . time() . ".{$extension}";
    }
}