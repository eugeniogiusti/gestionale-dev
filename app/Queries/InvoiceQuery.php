<?php

namespace App\Queries;

use App\Models\Payment;

class InvoiceQuery
{
    /**
     * Get last invoice number for a given year
     */
    public static function getLastInvoiceNumberForYear(int $year): ?string
    {
        return Payment::whereYear('created_at', $year)
            ->whereNotNull('invoice_number')
            ->orderBy('id', 'desc')
            ->value('invoice_number');
    }
}