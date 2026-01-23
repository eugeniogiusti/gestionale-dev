<?php

namespace App\Services;

use App\Models\Payment;
use App\Services\Invoice\InvoiceNumberGenerator;
use App\Services\Invoice\InvoicePdfGenerator;
use App\Services\Invoice\InvoiceStorageManager;
use Symfony\Component\HttpFoundation\StreamedResponse;

class InvoiceService
{
    public function __construct(
        private InvoiceNumberGenerator $numberGenerator,
        private InvoicePdfGenerator $pdfGenerator,
        private InvoiceStorageManager $storageManager
    ) {}

    /**
     * Generate invoice and save (no download)
     */
    public function generateAndSave(Payment $payment): void
    {
        $this->ensureInvoiceNumber($payment);
        
        $pdf = $this->pdfGenerator->generate($payment);
        $path = $this->storageManager->save($pdf, $payment->invoice_number);
        
        $payment->update(['invoice_path' => $path]);
    }

    /**
     * Generate invoice and download
     */
    public function generateAndDownload(Payment $payment): StreamedResponse
    {
        $this->ensureInvoiceNumber($payment);
        
        $pdf = $this->pdfGenerator->generate($payment);
        $path = $this->storageManager->save($pdf, $payment->invoice_number);
        
        $payment->update(['invoice_path' => $path]);

        return $this->storageManager->download($path, $payment->invoice_number);
    }

    /**
     * Download existing invoice
     */
    public function download(Payment $payment): StreamedResponse
    {
        if (!$this->storageManager->exists($payment->invoice_path)) {
            abort(404, 'Invoice not found');
        }

        return $this->storageManager->download($payment->invoice_path, $payment->invoice_number);
    }

    /**
     * Preview invoice
     */
    public function preview(Payment $payment): mixed
    {
        if (!$this->storageManager->exists($payment->invoice_path)) {
            $this->ensureInvoiceNumber($payment);
            return $this->pdfGenerator->stream($payment);
        }

        return $this->storageManager->preview($payment->invoice_path, $payment->invoice_number);
    }

    /**
     * Delete invoice
     */
    public function delete(Payment $payment): void
    {
        $this->storageManager->delete($payment->invoice_path);
        
        $payment->update([
            'invoice_number' => null,
            'invoice_path' => null,
        ]);
    }

    /**
     * Ensure payment has invoice number
     */
    private function ensureInvoiceNumber(Payment $payment): void
    {
        if (!$payment->invoice_number) {
            $payment->invoice_number = $this->numberGenerator->generate();
            $payment->save();
        }
    }
}