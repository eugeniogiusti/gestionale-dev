<?php

namespace App\Http\Controllers\Invoices;

use App\Http\Controllers\Controller;
use App\Models\Payment;
use App\Services\Invoices\InvoiceService;
use App\Http\Requests\Invoices\UploadInvoiceRequest;

class InvoiceController extends Controller
{
    public function __construct(
        private InvoiceService $invoiceService
    ) {}

    /**
     * Generate invoice PDF and download
     */
    public function generate(Payment $payment)
    {
        return $this->invoiceService->generateAndDownload($payment);
    }

    /**
     * Upload manual invoice
     */
    public function upload(UploadInvoiceRequest $request, Payment $payment)
    {
        $this->invoiceService->upload($payment, $request->file('invoice'));

        return redirect()
            ->route('projects.show', ['project' => $payment->project_id, 'tab' => 'payments'])
            ->with('success', __('invoices.uploaded_successfully'));
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