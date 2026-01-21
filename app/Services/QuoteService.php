<?php

namespace App\Services;

use App\Models\Project;
use App\Models\Quote;
use App\Services\Quote\QuotePDFService;

class QuoteService
{
    public function __construct(
        private QuotePDFService $pdfService
    ) {}

    /**
     * Create new quote
     */
    public function create(Project $project, array $data): Quote
    {
        return $project->quotes()->create([
            'title' => $data['title'],
            'items' => $data['items'],
            'notes' => $data['notes'] ?? null,
            'quote_date' => $data['quote_date'] ?? now(),
            'status' => 'draft',
        ]);
    }


        /**
     * Update quote status
     */
    public function updateStatus(Quote $quote, string $status): Quote  // ✅ AGGIUNGI QUESTO METODO
    {
        $quote->update(['status' => $status]);
        return $quote->fresh();
    }

    /**
     * Delete quote
     */
    public function delete(Quote $quote): void
    {
        $quote->delete();
    }

    /**
     * Generate PDF
     */
    public function generatePDF(Quote $quote)
    {
        return $this->pdfService->handle($quote);
    }
}