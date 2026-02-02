<?php

namespace App\Http\Controllers\Receipts;

use App\Http\Controllers\Controller;
use App\Http\Requests\Receipts\UploadReceiptRequest;
use App\Models\Cost;
use App\Models\Project;
use App\Services\Receipts\ReceiptService;
use Illuminate\Http\RedirectResponse;

class ReceiptController extends Controller
{
    public function __construct(
        private ReceiptService $receiptService
    ) {}

    /**
     * Upload receipt for cost
     */
    public function upload(UploadReceiptRequest $request, Project $project, Cost $cost): RedirectResponse
    {
        $this->receiptService->upload($cost, $request->file('receipt'));

        return redirect()
            ->route('projects.show', ['project' => $project, 'tab' => 'costs'])
            ->with('success', __('receipts.uploaded_successfully'));
    }

    /**
     * Download receipt
     */
    public function download(Project $project, Cost $cost)
    {
        return $this->receiptService->download($cost);
    }

    /**
     * Preview receipt
     */
    public function preview(Project $project, Cost $cost)
    {
        return $this->receiptService->preview($cost);
    }

    /**
     * Delete receipt
     */
    public function destroy(Project $project, Cost $cost): RedirectResponse
    {
        $this->receiptService->delete($cost);

        return redirect()
            ->route('projects.show', ['project' => $project, 'tab' => 'costs'])
            ->with('success', __('receipts.deleted_successfully'));
    }
}
