<div class="space-y-4">

    {{-- Amount + Paid At --}}
    <div class="grid grid-cols-2 gap-3">
        <div>
            <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">
                {{ __('costs.amount') }} ({{ $currencySymbol }}) <span class="text-red-500">*</span>
            </label>
            <input type="number"
                   name="amount"
                   x-model="formData.amount"
                   required
                   step="0.01"
                   min="0.01"
                   placeholder="{{ __('costs.placeholder.amount') }}"
                   class="w-full px-3 py-2 text-sm border border-gray-300 dark:border-gray-600 rounded-lg bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-100 focus:ring-2 focus:ring-emerald-500 transition">
            @error('amount')
                <p class="mt-0.5 text-xs text-red-600 dark:text-red-400">{{ $message }}</p>
            @enderror
        </div>
        <div>
            <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">
                {{ __('costs.paid_at') }} <span class="text-red-500">*</span>
            </label>
            <input type="date"
                   name="paid_at"
                   x-model="formData.paid_at"
                   required
                   class="w-full px-3 py-2 text-sm border border-gray-300 dark:border-gray-600 rounded-lg bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-100 focus:ring-2 focus:ring-emerald-500 transition">
            @error('paid_at')
                <p class="mt-0.5 text-xs text-red-600 dark:text-red-400">{{ $message }}</p>
            @enderror
        </div>
    </div>

    {{-- Type --}}
    <div>
        <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">
            {{ __('costs.type') }} <span class="text-red-500">*</span>
        </label>
        <select name="type"
                x-model="formData.type"
                required
                class="w-full px-3 py-2 text-sm border border-gray-300 dark:border-gray-600 rounded-lg bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-100 focus:ring-2 focus:ring-emerald-500 transition">
            @foreach(\App\Models\Cost::TYPES as $type)
                <option value="{{ $type }}">{{ __('costs.type_' . $type) }}</option>
            @endforeach
        </select>
        @error('type')
            <p class="mt-0.5 text-xs text-red-600 dark:text-red-400">{{ $message }}</p>
        @enderror
    </div>

    {{-- Notes --}}
    <div>
        <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">
            {{ __('costs.notes') }}
        </label>
        <textarea name="notes"
                  x-model="formData.notes"
                  rows="2"
                  placeholder="{{ __('costs.placeholder.notes') }}"
                  class="w-full px-3 py-2 text-sm border border-gray-300 dark:border-gray-600 rounded-lg bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-100 focus:ring-2 focus:ring-emerald-500 transition"></textarea>
        @error('notes')
            <p class="mt-0.5 text-xs text-red-600 dark:text-red-400">{{ $message }}</p>
        @enderror
    </div>

</div>
