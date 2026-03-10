<?php

namespace App\Services\Taxes;

use App\Models\Tax;
use App\Services\Taxes\Storage\TaxAttachmentStorageManager;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Str;
use Symfony\Component\HttpFoundation\BinaryFileResponse;
use Symfony\Component\HttpFoundation\StreamedResponse;

class TaxAttachmentService
{
    public function __construct(
        private TaxAttachmentStorageManager $storageManager
    ) {}

    public function upload(Tax $tax, UploadedFile $file): void
    {
        if ($tax->attachment) {
            $this->storageManager->delete($tax->attachment);
        }

        $filename = $this->generateFilename($tax, $file);
        $path = $this->storageManager->saveUploadedFile($file, $filename);

        $tax->update(['attachment' => $path]);
    }

    public function download(Tax $tax): StreamedResponse
    {
        $this->ensureExists($tax);

        return $this->storageManager->download($tax->attachment);
    }

    public function preview(Tax $tax): BinaryFileResponse
    {
        $this->ensureExists($tax);

        return $this->storageManager->preview($tax->attachment);
    }

    public function delete(Tax $tax): void
    {
        $this->storageManager->delete($tax->attachment);

        $tax->update(['attachment' => null]);
    }

    private function ensureExists(Tax $tax): void
    {
        if (!$this->storageManager->exists($tax->attachment)) {
            abort(404, __('taxes.attachment_not_found'));
        }
    }

    private function generateFilename(Tax $tax, UploadedFile $file): string
    {
        $year = $tax->reference_year;
        $date = now()->format('Y-m-d');
        $extension = $file->getClientOriginalExtension();

        $prefix = Str::slug(__('taxes.attachment'));

        return "{$prefix}-{$year}-{$date}-" . time() . ".{$extension}";
    }
}
