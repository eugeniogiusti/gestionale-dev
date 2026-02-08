<?php

namespace App\Services\Invoices;

use App\Models\Payment;
use App\Services\Invoices\Generators\InvoiceFilenameBuilder;
use App\Services\Invoices\Generators\InvoicePdfGenerator;
use App\Services\Invoices\Storage\InvoiceStorageManager;
use Symfony\Component\HttpFoundation\StreamedResponse;
use Illuminate\Http\UploadedFile;

/**
 * Main entry point for all invoice operations.
 *
 * Orchestrates PDF generation, file upload/download/preview, and deletion
 * for invoices linked to a Payment. Supports two flows:
 *
 * 1. Auto-generated invoices — rendered as PDF from a Blade template via InvoicePdfGenerator.
 * 2. Manually uploaded invoices — stored and served via InvoiceStorageManager.
 *
 * @see \App\Services\Invoices\Generators\InvoicePdfGenerator
 * @see \App\Services\Invoices\Storage\InvoiceStorageManager
 */
class InvoiceService
{
    public function __construct(
        private InvoicePdfGenerator $pdfGenerator,
        private InvoiceStorageManager $storageManager,
        private InvoiceFilenameBuilder $filenameBuilder
    ) {}

    /**
     * Generate invoice from payment and download
     */
    public function generateAndDownload(Payment $payment): StreamedResponse
    {
        return $this->pdfGenerator->generateAndDownload($payment);
    }

    /**
     * Upload manual invoice
     */
    public function upload(Payment $payment, UploadedFile $file): void
    {
        if ($payment->invoice_path) {
            $this->storageManager->delete($payment->invoice_path);
        }

        $path = $this->storageManager->saveUploadedFile($file);
        $payment->update(['invoice_path' => $path]);
    }

    /**
     * Download existing invoice (uploaded)
     */
    public function download(Payment $payment): StreamedResponse
    {
        if (!$this->storageManager->exists($payment->invoice_path)) {
            abort(404, __('invoices.not_found'));
        }

        $filename = $this->filenameBuilder->build($payment, $payment->invoice_path);

        return $this->storageManager->download($payment->invoice_path, $filename);
    }

    /**
     * Preview existing invoice (uploaded)
     */
    public function preview(Payment $payment): mixed
    {
        if (!$this->storageManager->exists($payment->invoice_path)) {
            abort(404, __('invoices.not_found'));
        }

        $filename = $this->filenameBuilder->build($payment, $payment->invoice_path);

        return $this->storageManager->preview($payment->invoice_path, $filename);
    }

    /**
     * Delete invoice (uploaded)
     */
    public function delete(Payment $payment): void
    {
        $this->storageManager->delete($payment->invoice_path);
        $payment->update(['invoice_path' => null]);
    }
}
