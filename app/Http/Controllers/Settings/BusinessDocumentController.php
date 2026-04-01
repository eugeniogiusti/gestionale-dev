<?php

namespace App\Http\Controllers\Settings;

use App\Http\Controllers\Controller;
use App\Http\Requests\Settings\StoreBusinessDocumentRequest;
use App\Http\Requests\Settings\UpdateBusinessDocumentRequest;
use App\Models\BusinessDocument;
use App\Services\Settings\BusinessDocumentService;

class BusinessDocumentController extends Controller
{
    public function __construct(
        private BusinessDocumentService $service
    ) {}

    /**
     * Upload a new business document and store metadata.
     */
    public function store(StoreBusinessDocumentRequest $request)
    {
        $this->service->upload($request->file('file'), $request->validated());

        return redirect()
            ->route('settings.business.edit', ['tab' => 'documents'])
            ->withFragment('documents')
            ->with('success', __('business_settings.documents.created'));
    }

    /**
     * Update document name and notes.
     */
    public function update(UpdateBusinessDocumentRequest $request, BusinessDocument $businessDocument)
    {
        $businessDocument->update($request->validated());

        return redirect()
            ->route('settings.business.edit', ['tab' => 'documents'])
            ->withFragment('documents')
            ->with('success', __('business_settings.documents.updated'));
    }

    /**
     * Delete the document file and its database record.
     */
    public function destroy(BusinessDocument $businessDocument)
    {
        $this->service->delete($businessDocument);

        return redirect()
            ->route('settings.business.edit', ['tab' => 'documents'])
            ->withFragment('documents')
            ->with('success', __('business_settings.documents.deleted'));
    }

    /**
     * Stream the document file as a download.
     */
    public function download(BusinessDocument $businessDocument)
    {
        return $this->service->download($businessDocument);
    }

    /**
     * Serve the document file inline for preview.
     */
    public function preview(BusinessDocument $businessDocument)
    {
        return $this->service->preview($businessDocument);
    }
}
