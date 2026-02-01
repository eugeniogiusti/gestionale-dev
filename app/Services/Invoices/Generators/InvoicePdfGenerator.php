<?php

namespace App\Services\Invoices\Generators;

use App\Models\Payment;
use App\Models\BusinessSettings;
use Barryvdh\DomPDF\Facade\Pdf;
use Symfony\Component\HttpFoundation\StreamedResponse;

class InvoicePdfGenerator
{
    public function __construct(
        private InvoiceNumberGenerator $numberGenerator
    ) {}

    /**
     * Generate and download PDF (main method)
     */
    public function generateAndDownload(Payment $payment): StreamedResponse
    {
        $invoiceNumber = $this->numberGenerator->generate($payment);
        $pdf = $this->generate($payment, $invoiceNumber);
        
        return $this->download($pdf, $invoiceNumber);
    }

    /**
     * Generate PDF object
     */
    private function generate(Payment $payment, string $invoiceNumber)
    {
        $this->loadRelations($payment);
        
        return Pdf::loadView('invoices.pdf', $this->prepareData($payment, $invoiceNumber))
            ->setPaper('a4');
    }

    /**
     * Download PDF as response
     */
    private function download($pdf, string $invoiceNumber): StreamedResponse
    {
        $safeFilename = str_replace('/', '-', $invoiceNumber);
        
        return response()->streamDownload(function () use ($pdf) {
            echo $pdf->output();
        }, __('invoices.invoice') . "-{$safeFilename}.pdf", [
            'Content-Type' => 'application/pdf',
        ]);
    }

    /**
     * Load required relationships
     */
    private function loadRelations(Payment $payment): void
    {
        if (!$payment->relationLoaded('project')) {
            $payment->load(['project.client']);
        }
    }

    /**
     * Prepare data for PDF view
     */
    private function prepareData(Payment $payment, string $invoiceNumber): array
    {
        $business = BusinessSettings::current();

        return [
            'payment' => $payment,
            'project' => $payment->project,
            'client' => $payment->project->client,
            'business' => $business,
            'invoice_number' => $invoiceNumber,
            'invoice_date' => $payment->paid_at ? $payment->paid_at->format('d/m/Y') : now()->format('d/m/Y'),
            'due_date' => $payment->due_date?->format('d/m/Y'),
        ];
    }
}