<?php

namespace App\Http\Controllers;

use App\Models\Payment;
use App\Services\InvoiceService;
use Illuminate\Http\RedirectResponse;

class InvoiceController extends Controller
{
    public function __construct(
        private InvoiceService $invoiceService
    ) {}

    public function generate(Payment $payment)
    {
        return $this->invoiceService->generateAndDownload($payment);
    }

    public function download(Payment $payment)
    {
        return $this->invoiceService->download($payment);
    }

    public function preview(Payment $payment)
    {
        return $this->invoiceService->preview($payment);
    }

    public function destroy(Payment $payment): RedirectResponse
    {
        $this->invoiceService->delete($payment);

        return redirect()
            ->back()
            ->with('success', __('invoices.deleted_successfully'));
    }
}