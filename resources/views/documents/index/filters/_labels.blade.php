{{-- Label Filter --}}
<div>
    <select name="label_id"
            class="w-full px-4 py-2 border border-gray-300 dark:border-gray-600 rounded-lg bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-100">
        <option value="">{{ __('documents.all_labels') }}</option>
        @foreach(\App\Models\Label::ordered()->get() as $label)
            <option value="{{ $label->id }}" {{ request('label_id') == $label->id ? 'selected' : '' }}>
                {{ $label->name }}
            </option>
        @endforeach
    </select>
</div>
