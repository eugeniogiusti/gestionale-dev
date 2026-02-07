<div class="space-y-6">
    
    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
        
        {{-- Tax ID --}}
        <x-form-input
            name="tax_id"
            :label="__('business_settings.tax_id')"
            :placeholder="__('business_settings.placeholder.tax_id')"
            :value="$settings->tax_id"
        />

        {{-- VAT Number  --}}
        <x-form-input
            name="vat_number"
            :label="__('business_settings.vat_number')"
            :placeholder="__('business_settings.placeholder.vat_number')"
            :value="$settings->vat_number"
        />

    </div>

    {{-- Default Currency --}}
    <div>
        <label for="default_currency" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">
            {{ __('business_settings.default_currency') }}
        </label>
        <select name="default_currency"
                id="default_currency"
                class="w-full px-3 py-2 text-sm border border-gray-300 dark:border-gray-600 rounded-lg bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-100 focus:ring-2 focus:ring-emerald-500 transition">
            @foreach(\App\Models\BusinessSettings::CURRENCIES as $code => $symbol)
                <option value="{{ $code }}" {{ ($settings->default_currency ?? 'EUR') === $code ? 'selected' : '' }}>
                    {{ $code }} ({{ $symbol }})
                </option>
            @endforeach
        </select>
    </div>

</div>