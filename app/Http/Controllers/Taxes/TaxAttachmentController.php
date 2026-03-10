<?php

namespace App\Http\Controllers\Taxes;

use App\Http\Controllers\Controller;
use App\Http\Requests\Taxes\UploadTaxAttachmentRequest;
use App\Models\Tax;
use App\Services\Taxes\TaxAttachmentService;
use Illuminate\Http\RedirectResponse;

class TaxAttachmentController extends Controller
{
    public function __construct(
        private TaxAttachmentService $attachmentService
    ) {}

    public function upload(UploadTaxAttachmentRequest $request, Tax $tax): RedirectResponse
    {
        $this->attachmentService->upload($tax, $request->file('attachment'));

        return redirect()
            ->route('taxes.index')
            ->with('success', __('taxes.attachment_uploaded_successfully'));
    }

    public function download(Tax $tax)
    {
        return $this->attachmentService->download($tax);
    }

    public function preview(Tax $tax)
    {
        return $this->attachmentService->preview($tax);
    }

    public function destroy(Tax $tax): RedirectResponse
    {
        $this->attachmentService->delete($tax);

        return redirect()
            ->route('taxes.index')
            ->with('success', __('taxes.attachment_deleted_successfully'));
    }
}
