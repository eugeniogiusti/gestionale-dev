<?php

namespace App\Http\Controllers;

use App\Models\Label;
use App\Http\Requests\StoreLabelRequest;
use App\Http\Requests\UpdateLabelRequest;
use App\Services\LabelService;

class LabelController extends Controller
{
    public function __construct(
        private LabelService $labelService
    ) {}

    /**
     * Display labels management page
     */
    public function index()
    {
        $labels = $this->labelService->getAll();
        
        return view('labels.index', compact('labels'));
    }

    /**
     * Store new label
     */
    public function store(StoreLabelRequest $request)
    {
        $this->labelService->create($request->validated());

        return back()->with('success', __('labels.created_successfully'));
    }

    /**
     * Update label
     */
    public function update(UpdateLabelRequest $request, Label $label)
    {
        $this->labelService->update($label, $request->validated());

        return back()->with('success', __('labels.updated_successfully'));
    }

    /**
     * Delete label
     */
    public function destroy(Label $label)
    {
        $this->labelService->delete($label);

        return back()->with('success', __('labels.deleted_successfully'));
    }
}