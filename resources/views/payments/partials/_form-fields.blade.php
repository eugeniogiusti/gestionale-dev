<div class="space-y-4">

    {{-- Checkbox: Pagamento Incassato --}}
    <div class="bg-gray-50 dark:bg-gray-900/50 p-3 rounded-lg border border-gray-200 dark:border-gray-700">
        <label class="flex items-center gap-2 cursor-pointer">
            <input type="checkbox"
                   x-model="formData.is_paid"
                   class="w-4 h-4 text-emerald-600 border-gray-300 rounded focus:ring-emerald-500">
            <span class="text-sm font-medium text-gray-900 dark:text-white">
                {{ __('payments.payment_received') }}
            </span>
        </label>
        <p class="mt-1 text-xs text-gray-500 dark:text-gray-400 ml-6">
            {{ __('payments.payment_received_help') }}
        </p>
    </div>

    {{-- Amount + Currency --}}
    <div class="grid grid-cols-2 gap-3">
        <div>
            <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">
                {{ __('payments.amount') }} <span class="text-red-500">*</span>
            </label>
            <input type="number"
                   name="amount"
                   x-model="formData.amount"
                   required
                   step="0.01"
                   min="0.01"
                   placeholder="{{ __('payments.placeholder.amount') }}"
                   class="w-full px-3 py-2 text-sm border border-gray-300 dark:border-gray-600 rounded-lg bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-100 focus:ring-2 focus:ring-emerald-500 transition">
            @error('amount')
                <p class="mt-0.5 text-xs text-red-600 dark:text-red-400">{{ $message }}</p>
            @enderror
        </div>
        <div>
            <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">
                {{ __('payments.currency') }} <span class="text-red-500">*</span>
            </label>
            <select name="currency"
                    x-model="formData.currency"
                    required
                    class="w-full px-3 py-2 text-sm border border-gray-300 dark:border-gray-600 rounded-lg bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-100 focus:ring-2 focus:ring-emerald-500 transition">
                @foreach(\App\Models\Payment::CURRENCIES as $code => $symbol)
                    <option value="{{ $code }}">{{ $code }} ({{ $symbol }})</option>
                @endforeach
            </select>
            @error('currency')
                <p class="mt-0.5 text-xs text-red-600 dark:text-red-400">{{ $message }}</p>
            @enderror
        </div>
    </div>

    {{-- CAMPI CONDIZIONALI INCASSATO --}}
    <div x-show="formData.is_paid" x-cloak>
        <div class="grid grid-cols-2 gap-3">
            <div>
                <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">
                    {{ __('payments.paid_at') }} <span class="text-red-500">*</span>
                </label>
                <input type="date"
                       name="paid_at"
                       x-model="formData.paid_at"
                       :required="formData.is_paid"
                       class="w-full px-3 py-2 text-sm border border-gray-300 dark:border-gray-600 rounded-lg bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-100 focus:ring-2 focus:ring-emerald-500 transition">
                @error('paid_at')
                    <p class="mt-0.5 text-xs text-red-600 dark:text-red-400">{{ $message }}</p>
                @enderror
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">
                    {{ __('payments.method') }} <span class="text-red-500">*</span>
                </label>
                <select name="method"
                        x-model="formData.method"
                        :required="formData.is_paid"
                        class="w-full px-3 py-2 text-sm border border-gray-300 dark:border-gray-600 rounded-lg bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-100 focus:ring-2 focus:ring-emerald-500 transition">
                    <option value="">{{ __('payments.select_method') }}</option>
                    @foreach(\App\Models\Payment::METHODS as $method)
                        <option value="{{ $method }}">{{ __('payments.method_' . $method) }}</option>
                    @endforeach
                </select>
                @error('method')
                    <p class="mt-0.5 text-xs text-red-600 dark:text-red-400">{{ $message }}</p>
                @enderror
            </div>
        </div>
    </div>

    {{-- CAMPI CONDIZIONALI NON INCASSATO --}}
    <div x-show="!formData.is_paid" x-cloak>
        <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">
            {{ __('payments.due_date') }} <span class="text-red-500">*</span>
        </label>
        <input type="date"
               name="due_date"
               x-model="formData.due_date"
               :required="!formData.is_paid"
               class="w-full px-3 py-2 text-sm border border-gray-300 dark:border-gray-600 rounded-lg bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-100 focus:ring-2 focus:ring-emerald-500 transition">
        @error('due_date')
            <p class="mt-0.5 text-xs text-red-600 dark:text-red-400">{{ $message }}</p>
        @enderror
        <p class="mt-0.5 text-xs text-gray-500 dark:text-gray-400">
            {{ __('payments.due_date_help_unpaid') }}
        </p>
    </div>

    {{-- Reference + Notes --}}
    <div>
        <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">
            {{ __('payments.reference') }}
        </label>
        <input type="text"
               name="reference"
               x-model="formData.reference"
               placeholder="{{ __('payments.placeholder.reference') }}"
               class="w-full px-3 py-2 text-sm border border-gray-300 dark:border-gray-600 rounded-lg bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-100 focus:ring-2 focus:ring-emerald-500 transition">
        @error('reference')
            <p class="mt-0.5 text-xs text-red-600 dark:text-red-400">{{ $message }}</p>
        @enderror
    </div>

    <div>
        <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">
            {{ __('payments.notes') }}
        </label>
        <textarea name="notes"
                  x-model="formData.notes"
                  rows="2"
                  placeholder="{{ __('payments.placeholder.notes') }}"
                  class="w-full px-3 py-2 text-sm border border-gray-300 dark:border-gray-600 rounded-lg bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-100 focus:ring-2 focus:ring-emerald-500 transition"></textarea>
        @error('notes')
            <p class="mt-0.5 text-xs text-red-600 dark:text-red-400">{{ $message }}</p>
        @enderror
    </div>

</div>
