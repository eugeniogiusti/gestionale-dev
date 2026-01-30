<div class="space-y-4">
    
    {{-- File Upload (only on create) --}}
    <div x-show="!isEdit">
        @include('documents.partials._file-upload')
    </div>

    {{-- Name --}}
    <div>
        <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">
            {{ __('documents.name') }} <span class="text-red-500">*</span>
        </label>
        <input type="text"
               name="name"
               x-model="formData.name"
               required
               placeholder="{{ __('documents.placeholder.name') }}"
               class="w-full px-3 py-2 text-sm border border-gray-300 dark:border-gray-600 rounded-lg bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-100 focus:ring-2 focus:ring-emerald-500 transition">
        @error('name')
            <p class="mt-0.5 text-xs text-red-600 dark:text-red-400">{{ $message }}</p>
        @enderror
    </div>

    {{-- Labels --}}
    <div>
        <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">
            {{ __('documents.labels') }}
        </label>
        <div class="flex flex-wrap gap-2">
            @foreach($labels as $label)
                <label class="inline-flex items-center">
                    <input type="checkbox"
                           name="label_ids[]"
                           value="{{ $label->id }}"
                           x-model="formData.label_ids"
                           class="rounded border-gray-300 dark:border-gray-600 text-emerald-600 shadow-sm focus:ring-emerald-500">
                    <span class="ml-1.5">
                        <x-documents.label-badge :label="$label" />
                    </span>
                </label>
            @endforeach
        </div>
        <p class="mt-1 text-xs text-gray-500 dark:text-gray-400">
            {{ __('documents.labels_hint') }}
        </p>
    </div>

    {{-- Notes --}}
    <div>
        <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">
            {{ __('documents.notes') }}
        </label>
        <textarea name="notes"
                  x-model="formData.notes"
                  rows="2"
                  placeholder="{{ __('documents.placeholder.notes') }}"
                  class="w-full px-3 py-2 text-sm border border-gray-300 dark:border-gray-600 rounded-lg bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-100 focus:ring-2 focus:ring-emerald-500 transition"></textarea>
        @error('notes')
            <p class="mt-0.5 text-xs text-red-600 dark:text-red-400">{{ $message }}</p>
        @enderror
    </div>

</div>