<div class="space-y-6">
    
    {{-- Address --}}
    <x-form-input
        name="legal_address"
        :label="__('business_settings.legal_address')"
        :placeholder="__('business_settings.placeholder.legal_address')"
        :value="$settings->legal_address"
    />

    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
        
        {{-- City --}}
        <x-form-input
            name="legal_city"
            :label="__('business_settings.legal_city')"
            :placeholder="__('business_settings.placeholder.legal_city')"
            :value="$settings->legal_city"
        />

        {{-- ZIP --}}
        <x-form-input
            name="legal_zip"
            :label="__('business_settings.legal_zip')"
            :placeholder="__('business_settings.placeholder.legal_zip')"
            :value="$settings->legal_zip"
        />

        {{-- Province --}}
        <x-form-input
            name="legal_province"
            :label="__('business_settings.legal_province')"
            :placeholder="__('business_settings.placeholder.legal_province')"
            :value="$settings->legal_province"
            maxlength="2"
        />

    </div>

    {{-- Country --}}
    <x-form-input
        name="legal_country"
        :label="__('business_settings.legal_country')"
        :placeholder="__('business_settings.placeholder.legal_country')"
        :value="$settings->legal_country"
        maxlength="2"
    />

</div>