<?php

namespace App\Services\Quote;

use App\Models\Quote;
use App\Models\BusinessSettings;
use Barryvdh\DomPDF\Facade\Pdf;

class QuotePDFService
{
    /**
     * Generate PDF
     */
    public function handle(Quote $quote)
    {
        $business = BusinessSettings::first();
        
        $pdf = PDF::loadView('quotes.pdf', [
            'quote' => $quote,
            'business' => $business,
            'client' => $quote->client,
            'project' => $quote->project,
        ]);

        $pdf->setPaper('A4', 'portrait');

        // Nome file semplice
        $filename = sprintf(
            'preventivo-%s-%s.pdf',
            $quote->project->name,
            $quote->quote_date->format('Y-m-d')
        );

        return $pdf->download($filename);
    }
}