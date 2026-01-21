<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\Quote;
use App\Http\Requests\StoreQuoteRequest;
use App\Http\Requests\UpdateQuoteRequest;
use App\Services\QuoteService;
use App\Queries\QuoteIndexQuery;
use App\Queries\QuoteStatsQuery;

class QuoteController extends Controller
{
    public function __construct(
        private QuoteService $quoteService
    ) {}

    /**
     * Display quotes list
     */
    public function index(QuoteIndexQuery $indexQuery, QuoteStatsQuery $statsQuery)
    {
        $quotes = $indexQuery->handle();
        $stats = $statsQuery->handle();

        return view('quotes.index', compact('quotes', 'stats'));
    }

    /**
     * Store new quote
     */
    public function store(StoreQuoteRequest $request, Project $project)
    {
        $this->quoteService->create($project, $request->validated());

        return redirect()
            ->route('projects.show', $project)
            ->withFragment('quotes')
            ->with('success', __('quotes.created_successfully'));
    }

    /**
     * Update quote status
     */
    public function updateStatus(UpdateQuoteRequest $request, Project $project, Quote $quote)  
    {
        $this->quoteService->updateStatus($quote, $request->validated()['status']);

        return redirect()
            ->route('projects.show', $project)
            ->withFragment('quotes')
            ->with('success', __('quotes.status_updated'));
    }

    /**
     * Delete quote
     */
    public function destroy(Project $project, Quote $quote)
    {
        $this->quoteService->delete($quote);

        return redirect()
            ->route('projects.show', $project)
            ->withFragment('quotes')
            ->with('success', __('quotes.deleted_successfully'));
    }

    /**
     * Download PDF
     */
    public function download(Project $project, Quote $quote)
    {
        return $this->quoteService->generatePDF($quote);
    }
}