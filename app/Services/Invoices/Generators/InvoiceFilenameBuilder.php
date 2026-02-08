<?php

namespace App\Services\Invoices\Generators;

use App\Models\Payment;

/**
 * Builds human-readable filenames for invoice downloads.
 *
 * Generates names in the format: "Invoice-001-2025.pdf" using the payment ID
 * (zero-padded) and creation year. Preserves the original file extension
 * when an uploaded file path is provided, defaults to "pdf" otherwise.
 */
class InvoiceFilenameBuilder
{
    /**
     * Build a download-friendly filename for the given payment's invoice.
     *
     * @param Payment     $payment      The payment this invoice belongs to.
     * @param string|null $originalPath Path of the uploaded file (used to detect extension).
     */
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
