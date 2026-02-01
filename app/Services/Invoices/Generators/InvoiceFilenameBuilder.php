<?php

namespace App\Services\Invoices\Generators;

use App\Models\Payment;

class InvoiceFilenameBuilder
{
    public function build(Payment $payment): string
    {
        $reference = $payment->reference ?? $payment->id;

        return __('invoices.invoice') . "-{$reference}.pdf";
    }
}
