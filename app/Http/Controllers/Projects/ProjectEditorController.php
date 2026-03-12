<?php

namespace App\Http\Controllers\Projects;

use App\Http\Controllers\Controller;
use App\Http\Requests\Projects\StoreEditorImageRequest;
use App\Http\Requests\Projects\UpdateEditorRequest;
use App\Models\Project;
use Illuminate\Support\Facades\Storage;

class ProjectEditorController extends Controller
{
    public function update(UpdateEditorRequest $request, Project $project)
    {
        $project->update($request->validated());

        return redirect()
            ->route('projects.show', [$project, 'tab' => 'editor'])
            ->with('success', __('projects.editor_saved'));
    }

    public function uploadImage(StoreEditorImageRequest $request, Project $project)
    {
        $file = $request->file('image');
        $extension = $file->getClientOriginalExtension();
        $filename = 'img-' . time() . '-' . bin2hex(random_bytes(8)) . '.' . $extension;

        $file->storeAs("editor-images/{$project->id}", $filename, 'local');

        return response()->json([
            'url' => route('projects.editor.image', [$project, $filename]),
        ]);
    }

    public function serveImage(Project $project, string $filename)
    {
        $path = Storage::path("editor-images/{$project->id}/{$filename}");

        abort_unless(file_exists($path), 404);

        return response()->file($path, [
            'Content-Type'           => mime_content_type($path),
            'Cache-Control'          => 'private, max-age=86400',
            'X-Content-Type-Options' => 'nosniff',
        ]);
    }
}
