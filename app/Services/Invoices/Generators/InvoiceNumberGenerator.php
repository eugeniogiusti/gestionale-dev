<?php

namespace App\Services\Invoices\Generators;

use App\Models\Payment;

/**
 * Generates unique, sequential invoice numbers.
 *
 * Format: "{payment_id}/{year}" (e.g. "42/2025").
 * Uniqueness is guaranteed by the underlying payment primary key.
 * Used by InvoicePdfGenerator when rendering the invoice PDF.
 */
class InvoiceNumberGenerator
{
    /**
     * Generate unique invoice number (format: {payment_id}/{year})
     * Uses payment ID for guaranteed uniqueness
     */
    public function generate(Payment $payment): string
    {
        $year = $payment->created_at->year;
        
        return "{$payment->id}/{$year}";
    }
}