<div class="space-y-4">
    
    {{-- Amount --}}
    <div>
        <label class="block text-sm font-semibold text-gray-700 dark:text-gray-300 mb-2">
            {{ __('payments.amount') }} <span class="text-red-500">*</span>
        </label>
        <input type="number" 
               name="amount" 
               x-model="formData.amount"
               required
               step="0.01"
               min="0.01"
               placeholder="{{ __('payments.placeholder.amount') }}"
               class="w-full px-4 py-3 border border-gray-300 dark:border-gray-600 rounded-lg bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-100 focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500 transition">
        @error('amount')
            <p class="mt-1 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
        @enderror
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
        
        {{-- Currency --}}
        <div>
            <label class="block text-sm font-semibold text-gray-700 dark:text-gray-300 mb-2">
                {{ __('payments.currency') }} <span class="text-red-500">*</span>
            </label>
            <select name="currency" 
                    x-model="formData.currency"
                    required
                    class="w-full px-4 py-3 border border-gray-300 dark:border-gray-600 rounded-lg bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-100 focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500 transition">
                @foreach(\App\Models\Payment::CURRENCIES as $code => $symbol)
                    <option value="{{ $code }}">{{ $code }} ({{ $symbol }})</option>
                @endforeach
            </select>
            @error('currency')
                <p class="mt-1 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
            @enderror
        </div>

        {{-- Paid At --}}
        <div>
            <label class="block text-sm font-semibold text-gray-700 dark:text-gray-300 mb-2">
                {{ __('payments.paid_at') }} <span class="text-red-500">*</span>
            </label>
            <input type="date" 
                   name="paid_at" 
                   x-model="formData.paid_at"
                   required
                   class="w-full px-4 py-3 border border-gray-300 dark:border-gray-600 rounded-lg bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-100 focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500 transition">
            @error('paid_at')
                <p class="mt-1 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
            @enderror
        </div>

    </div>

    {{-- Due Date --}}
    <div>
        <label class="block text-sm font-semibold text-gray-700 dark:text-gray-300 mb-2">
            {{ __('payments.due_date') }}
        </label>
        <input type="date" 
               name="due_date" 
               x-model="formData.due_date"
               class="w-full px-4 py-3 border border-gray-300 dark:border-gray-600 rounded-lg bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-100 focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500 transition">
        @error('due_date')
            <p class="mt-1 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
        @enderror
        <p class="mt-1 text-xs text-gray-500 dark:text-gray-400">
            {{ __('payments.due_date_help') }}
        </p>
    </div>

    {{-- Method --}}
    <div>
        <label class="block text-sm font-semibold text-gray-700 dark:text-gray-300 mb-2">
            {{ __('payments.method') }} <span class="text-red-500">*</span>
        </label>
        <select name="method" 
                x-model="formData.method"
                required
                class="w-full px-4 py-3 border border-gray-300 dark:border-gray-600 rounded-lg bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-100 focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500 transition">
            @foreach(\App\Models\Payment::METHODS as $method)
                <option value="{{ $method }}">{{ __('payments.method_' . $method) }}</option>
            @endforeach
        </select>
        @error('method')
            <p class="mt-1 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
        @enderror
    </div>

    {{-- Reference --}}
    <div>
        <label class="block text-sm font-semibold text-gray-700 dark:text-gray-300 mb-2">
            {{ __('payments.reference') }}
        </label>
        <input type="text" 
               name="reference" 
               x-model="formData.reference"
               placeholder="{{ __('payments.placeholder.reference') }}"
               class="w-full px-4 py-3 border border-gray-300 dark:border-gray-600 rounded-lg bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-100 focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500 transition">
        @error('reference')
            <p class="mt-1 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
        @enderror
    </div>

    {{-- Notes --}}
    <div>
        <label class="block text-sm font-semibold text-gray-700 dark:text-gray-300 mb-2">
            {{ __('payments.notes') }}
        </label>
        <textarea name="notes" 
                  x-model="formData.notes"
                  rows="3"
                  placeholder="{{ __('payments.placeholder.notes') }}"
                  class="w-full px-4 py-3 border border-gray-300 dark:border-gray-600 rounded-lg bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-100 focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500 transition"></textarea>
        @error('notes')
            <p class="mt-1 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
        @enderror
        <p class="mt-1 text-xs text-gray-500 dark:text-gray-400">
            {{ __('payments.notes_help') }}
        </p>
    </div>

</div>