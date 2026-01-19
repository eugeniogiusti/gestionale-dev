<?php

namespace App\Services\Invoice;

use App\Queries\InvoiceQuery;

class InvoiceNumberGenerator
{
    /**
     * Generate unique invoice number (format: 3/2025)
     */
    public function generate(): string
    {
        $year = now()->year;
        $lastNumber = InvoiceQuery::getLastInvoiceNumberForYear($year);
        
        if (!$lastNumber) {
            return "1/{$year}";
        }
        
        preg_match('/(\d+)\//', $lastNumber, $matches);
        $number = ($matches[1] ?? 0) + 1;
        
        return "{$number}/{$year}";
    }
}