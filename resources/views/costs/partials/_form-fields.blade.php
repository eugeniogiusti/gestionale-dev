<div class="space-y-4">
    
    {{-- Amount --}}
    <div>
        <label class="block text-sm font-semibold text-gray-700 dark:text-gray-300 mb-2">
            {{ __('costs.amount') }} <span class="text-red-500">*</span>
        </label>
        <input type="number" 
               name="amount" 
               x-model="formData.amount"
               required
               step="0.01"
               min="0.01"
               placeholder="{{ __('costs.placeholder.amount') }}"
               class="w-full px-4 py-3 border border-gray-300 dark:border-gray-600 rounded-lg bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-100 focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500 transition">
        @error('amount')
            <p class="mt-1 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
        @enderror
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
        
        {{-- Currency --}}
        <div>
            <label class="block text-sm font-semibold text-gray-700 dark:text-gray-300 mb-2">
                {{ __('costs.currency') }} <span class="text-red-500">*</span>
            </label>
            <select name="currency" 
                    x-model="formData.currency"
                    required
                    class="w-full px-4 py-3 border border-gray-300 dark:border-gray-600 rounded-lg bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-100 focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500 transition">
                @foreach(\App\Models\Cost::CURRENCIES as $code => $symbol)
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
                {{ __('costs.paid_at') }} <span class="text-red-500">*</span>
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

    {{-- Type --}}
    <div>
        <label class="block text-sm font-semibold text-gray-700 dark:text-gray-300 mb-2">
            {{ __('costs.type') }} <span class="text-red-500">*</span>
        </label>
        <select name="type" 
                x-model="formData.type"
                required
                class="w-full px-4 py-3 border border-gray-300 dark:border-gray-600 rounded-lg bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-100 focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500 transition">
            @foreach(\App\Models\Cost::TYPES as $type)
                <option value="{{ $type }}">{{ __('costs.type_' . $type) }}</option>
            @endforeach
        </select>
        @error('type')
            <p class="mt-1 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
        @enderror
    </div>

    {{-- Recurring Checkbox --}}
    <div>
        <label class="flex items-center">
            <input type="checkbox" 
                   name="recurring" 
                   value="1"
                   x-model="formData.recurring"
                   class="rounded border-gray-300 dark:border-gray-600 text-emerald-600 shadow-sm focus:ring-emerald-500 dark:focus:ring-emerald-600">
            <span class="ml-2 text-sm text-gray-700 dark:text-gray-300">
                {{ __('costs.recurring_cost') }}
            </span>
        </label>
    </div>

    {{-- Recurring Period (conditional) --}}
    <div x-show="formData.recurring">
        <label class="block text-sm font-semibold text-gray-700 dark:text-gray-300 mb-2">
            {{ __('costs.recurring_period') }} <span class="text-red-500">*</span>
        </label>
        <select name="recurring_period" 
                x-model="formData.recurring_period"
                :required="formData.recurring"
                class="w-full px-4 py-3 border border-gray-300 dark:border-gray-600 rounded-lg bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-100 focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500 transition">
            <option value="">{{ __('costs.select_period') }}</option>
            @foreach(\App\Models\Cost::RECURRING_PERIODS as $period)
                <option value="{{ $period }}">{{ __('costs.period_' . $period) }}</option>
            @endforeach
        </select>
        @error('recurring_period')
            <p class="mt-1 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
        @enderror
    </div>

    {{-- Notes --}}
    <div>
        <label class="block text-sm font-semibold text-gray-700 dark:text-gray-300 mb-2">
            {{ __('costs.notes') }}
        </label>
        <textarea name="notes" 
                  x-model="formData.notes"
                  rows="3"
                  placeholder="{{ __('costs.placeholder.notes') }}"
                  class="w-full px-4 py-3 border border-gray-300 dark:border-gray-600 rounded-lg bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-100 focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500 transition"></textarea>
        @error('notes')
            <p class="mt-1 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
        @enderror
    </div>

</div>