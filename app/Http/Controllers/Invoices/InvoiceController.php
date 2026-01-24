<?php

namespace App\Http\Controllers\Invoices;

use App\Http\Controllers\Controller;
use App\Models\Payment;
use App\Services\Invoices\InvoiceService;

class InvoiceController extends Controller
{
    public function __construct(
        private InvoiceService $invoiceService
    ) {}

    /**
     * Generate invoice PDF from payment
     */
    public function generate(Payment $payment)
    {
        $this->invoiceService->generateAndSave($payment);

        return redirect()
            ->route('projects.show', ['project' => $payment->project_id, 'tab' => 'payments'])
            ->with('success', __('invoices.generated_successfully'));
    }

    /**
     * Preview invoice PDF
     */
    public function preview(Payment $payment)
    {
        return $this->invoiceService->preview($payment);
    }

    /**
     * Download invoice PDF
     */
    public function download(Payment $payment)
    {
        return $this->invoiceService->download($payment);
    }

    /**
     * Delete invoice
     */
    public function destroy(Payment $payment)
    {
        $this->invoiceService->delete($payment);

        return redirect()
            ->route('projects.show', ['project' => $payment->project_id, 'tab' => 'payments'])
            ->with('success', __('invoices.deleted_successfully'));
    }
}