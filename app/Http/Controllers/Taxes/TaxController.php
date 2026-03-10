<?php

namespace App\Http\Controllers\Taxes;

use App\Http\Controllers\Controller;
use App\Http\Requests\Taxes\StoreTaxRequest;
use App\Http\Requests\Taxes\UpdateTaxRequest;
use App\Models\Tax;
use App\Queries\Taxes\TaxIndexQuery;
use App\Queries\Taxes\TaxStatsQuery;

class TaxController extends Controller
{
    public function index(TaxIndexQuery $indexQuery, TaxStatsQuery $statsQuery)
    {
        $taxes = $indexQuery->handle();
        $stats = $statsQuery->handle();
        $availableYears = $this->getAvailableYears();

        return view('taxes.index', compact('taxes', 'stats', 'availableYears'));
    }

    private function getAvailableYears(): array
    {
        return range(now()->year, 2026);
    }

    public function store(StoreTaxRequest $request)
    {
        Tax::create($request->validated());

        return redirect()
            ->route('taxes.index')
            ->with('success', __('taxes.created_successfully'));
    }

    public function update(UpdateTaxRequest $request, Tax $tax)
    {
        $tax->update($request->validated());

        return redirect()
            ->route('taxes.index')
            ->with('success', __('taxes.updated_successfully'));
    }

    public function destroy(Tax $tax)
    {
        $tax->delete();

        return redirect()
            ->route('taxes.index')
            ->with('success', __('taxes.deleted_successfully'));
    }
}
