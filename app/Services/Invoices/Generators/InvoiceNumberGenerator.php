<?php

namespace App\Services\Invoices\Generators;

use App\Models\Payment;

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