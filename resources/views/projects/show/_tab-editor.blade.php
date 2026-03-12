<form
    method="POST"
    action="{{ route('projects.editor.update', $project) }}"
    class="space-y-4">
    @csrf
    @method('PUT')

    <input
        id="editor_notes_input"
        type="hidden"
        name="editor_notes"
        value="{{ $project->editor_notes }}">

    <trix-editor
        input="editor_notes_input"
        data-upload-url="{{ route('projects.editor.image.upload', $project) }}"
        data-error-invalid-type="{{ __('projects.editor_image_invalid_type') }}"
        data-error-upload="{{ __('projects.editor_image_upload_error') }}"
        class="trix-content rounded-lg border border-gray-300 dark:border-gray-600 min-h-[400px]">
    </trix-editor>

    <div class="flex justify-end">
        <button
            type="submit"
            class="inline-flex items-center gap-2 px-4 py-2 bg-emerald-600 hover:bg-emerald-700 text-white text-sm font-medium rounded-lg transition">
            <svg class="h-4 w-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                <path d="M19 21H5a2 2 0 01-2-2V5a2 2 0 012-2h11l5 5v11a2 2 0 01-2 2z"/>
                <path d="M17 21v-8H7v8M7 3v5h8"/>
            </svg>
            {{ __('ui.save') }}
        </button>
    </div>

</form>
