<?php

namespace App\Services\Receipts;

use App\Models\Cost;
use App\Services\Receipts\Storage\ReceiptStorageManager;
use Illuminate\Http\UploadedFile;
use Symfony\Component\HttpFoundation\BinaryFileResponse;
use Symfony\Component\HttpFoundation\StreamedResponse;

class ReceiptService
{
    public function __construct(
        private ReceiptStorageManager $storageManager
    ) {}

    /**
     * Upload receipt for cost
     */
    public function upload(Cost $cost, UploadedFile $file): void
    {
        // Delete old receipt if exists
        if ($cost->receipt_path) {
            $this->storageManager->delete($cost->receipt_path);
        }

        // Save new receipt
        $filename = $this->generateFilename($cost, $file);
        $path = $this->storageManager->saveUploadedFile($file, $filename);

        $cost->update(['receipt_path' => $path]);
    }

    /**
     * Download receipt
     */
    public function download(Cost $cost): StreamedResponse
    {
        $this->ensureReceiptExists($cost);

        return $this->storageManager->download($cost->receipt_path);
    }

    /**
     * Preview receipt
     */
    public function preview(Cost $cost): BinaryFileResponse
    {
        $this->ensureReceiptExists($cost);

        return $this->storageManager->preview($cost->receipt_path);
    }

    /**
     * Delete receipt
     */
    public function delete(Cost $cost): void
    {
        $this->storageManager->delete($cost->receipt_path);

        $cost->update(['receipt_path' => null]);
    }

    /**
     * Ensure receipt exists or abort
     */
    private function ensureReceiptExists(Cost $cost): void
    {
        if (!$this->storageManager->exists($cost->receipt_path)) {
            abort(404, __('receipts.not_found'));
        }
    }

    /**
     * Generate unique filename for receipt
     */
    private function generateFilename(Cost $cost, UploadedFile $file): string
    {
        $prefix = __('receipts.filename_prefix');
        $date = $cost->paid_at->format('Y-m-d');
        $type = $cost->type;
        $extension = $file->getClientOriginalExtension();

        return "{$prefix}-{$type}-{$date}-" . time() . ".{$extension}";
    }
}
