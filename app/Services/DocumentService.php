<?php

namespace App\Services;

use App\Models\Document;
use App\Models\Project;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Symfony\Component\HttpFoundation\BinaryFileResponse;
use Symfony\Component\HttpFoundation\StreamedResponse;

class DocumentService
{
    /**
     * Upload document for project
     */
    public function upload(Project $project, UploadedFile $file, array $data): Document
    {
        // Generate unique filename
        $filename = $this->generateFilename($file);
        $path = $file->storeAs('documents', $filename, 'local');

        // Create document
        $document = $project->documents()->create([
            'name' => $data['name'],
            'file_path' => $path,
            'uploaded_at' => now(),
            'notes' => $data['notes'] ?? null,
        ]);

        // Attach labels
        if (!empty($data['label_ids'])) {
            $document->labels()->sync($data['label_ids']);
        }

        return $document;
    }

    /**
     * Update document
     */
    public function update(Document $document, array $data): Document
    {
        $document->update([
            'name' => $data['name'],
            'notes' => $data['notes'] ?? null,
        ]);

        // Sync labels
        $document->labels()->sync($data['label_ids'] ?? []);

        return $document->fresh();
    }

    /**
     * Delete document and file
     */
    public function delete(Document $document): void
    {
        // Delete file from storage
        if ($document->file_path && Storage::exists($document->file_path)) {
            Storage::delete($document->file_path);
        }

        // Delete record
        $document->delete();
    }

    /**
     * Download document
     */
    public function download(Document $document): StreamedResponse
    {
        if (!$this->exists($document)) {
            abort(404, 'Document not found');
        }

        $filename = $document->name . '.' . $document->file_extension;

        return Storage::download($document->file_path, $filename);
    }

    /**
     * Preview document
     */
    public function preview(Document $document): BinaryFileResponse
    {
        if (!$this->exists($document)) {
            abort(404, 'Document not found');
        }

        return response()->file(Storage::path($document->file_path));
    }

    /**
     * Check if document file exists
     */
    private function exists(Document $document): bool
    {
        return $document->file_path && Storage::exists($document->file_path);
    }

    /**
     * Generate unique filename
     */
    private function generateFilename(UploadedFile $file): string
    {
        $extension = $file->getClientOriginalExtension();
        $timestamp = time();
        $random = bin2hex(random_bytes(8));
        
        return "doc-{$timestamp}-{$random}.{$extension}";
    }
}