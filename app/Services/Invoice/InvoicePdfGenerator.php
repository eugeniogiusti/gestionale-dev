<?php

namespace App\Services\Invoice;

use App\Models\Payment;
use App\Models\BusinessSettings;
use Barryvdh\DomPDF\Facade\Pdf;

class InvoicePdfGenerator
{
    /**
     * Generate PDF for invoice
     */
    public function generate(Payment $payment)
    {
        $this->loadRelations($payment);
        
        return Pdf::loadView('invoices.pdf', $this->prepareData($payment))
            ->setPaper('a4');
    }

    /**
     * Stream PDF for preview
     */
    public function stream(Payment $payment)
    {
        $pdf = $this->generate($payment);
        $filename = str_replace('/', '-', $payment->invoice_number) . '.pdf';
        
        return $pdf->stream("Fattura-{$filename}");
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
    private function prepareData(Payment $payment): array
    {
        $business = BusinessSettings::current();

        return [
            'payment' => $payment,
            'project' => $payment->project,
            'client' => $payment->project->client,
            'business' => $business,
            'invoice_number' => $payment->invoice_number,
            'invoice_date' => $payment->paid_at->format('d/m/Y'),
            'due_date' => $payment->due_date?->format('d/m/Y'),
        ];
    }
}