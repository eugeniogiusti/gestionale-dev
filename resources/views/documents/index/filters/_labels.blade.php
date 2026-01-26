{{-- Label Filter --}}
<div>
    <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
        {{ __('documents.filter_by_labels') }}
    </label>
    <select name="label_ids[]" 
            multiple
            class="w-full px-4 py-2 border border-gray-300 dark:border-gray-600 rounded-lg bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-100">
        @foreach(\App\Models\Label::ordered()->get() as $label)
            <option value="{{ $label->id }}" {{ in_array($label->id, request('label_ids', [])) ? 'selected' : '' }}>
                {{ $label->name }}
            </option>
        @endforeach
    </select>
</div>