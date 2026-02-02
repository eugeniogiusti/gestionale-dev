<?php

namespace App\Services\Invoices\Generators;

use App\Models\Payment;

class InvoiceFilenameBuilder
{
    public function build(Payment $payment, ?string $originalPath = null): string
    {
        $number = str_pad($payment->id, 3, '0', STR_PAD_LEFT);
        $year = $payment->created_at->year;
        $extension = $originalPath
            ? pathinfo($originalPath, PATHINFO_EXTENSION)
            : 'pdf';

        return __('invoices.invoice') . "-{$number}-{$year}.{$extension}";
    }
}
