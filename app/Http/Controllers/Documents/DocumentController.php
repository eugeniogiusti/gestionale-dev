<?php

namespace App\Http\Controllers\Documents;

use App\Http\Controllers\Controller;
use App\Http\Requests\Documents\StoreDocumentRequest;
use App\Http\Requests\Documents\UpdateDocumentRequest;
use App\Queries\Documents\DocumentIndexQuery;
use App\Queries\Documents\DocumentStatsQuery;
use App\Services\Documents\DocumentService;

class DocumentController extends Controller
{
    public function __construct(
        private DocumentService $documentService
    ) {}

    /**
     * Display a listing of documents (global index with filters)
     */
    public function index(DocumentIndexQuery $indexQuery, DocumentStatsQuery $statsQuery)
    {
        $documents = $indexQuery->handle();
        $stats = $statsQuery->handle();
        
        return view('documents.index', compact('documents', 'stats'));
    }

    /**
     * Store a new document (from project show page)
     */
    public function store(StoreDocumentRequest $request, Project $project)
    {
        $this->documentService->upload(
            $project,
            $request->file('file'),
            $request->validated()
        );

        return redirect()
            ->route('projects.show', ['project' => $project, 'tab' => 'documents'])
            ->with('success', __('documents.created_successfully'));
    }

    /**
     * Update document (from project show page)
     */
    public function update(UpdateDocumentRequest $request, Project $project, Document $document)
    {
        $this->documentService->update($document, $request->validated());

        return redirect()
            ->route('projects.show', ['project' => $project, 'tab' => 'documents'])
            ->with('success', __('documents.updated_successfully'));
    }

    /**
     * Delete document (from project show page)
     */
    public function destroy(Project $project, Document $document)
    {
        $this->documentService->delete($document);

        return redirect()
            ->route('projects.show', ['project' => $project, 'tab' => 'documents'])
            ->with('success', __('documents.deleted_successfully'));
    }

    /**
     * Download document
     */
    public function download(Project $project, Document $document)
    {
        return $this->documentService->download($document);
    }

    /**
     * Preview document
     */
    public function preview(Project $project, Document $document)
    {
        return $this->documentService->preview($document);
    }
}