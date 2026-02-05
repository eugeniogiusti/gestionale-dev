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

</div>