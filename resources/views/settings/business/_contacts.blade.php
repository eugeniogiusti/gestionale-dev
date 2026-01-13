<div class="space-y-6">
    
    {{-- Email --}}
    <x-form-input
        type="email"
        name="email"
        :label="__('business_settings.email')"
        :placeholder="__('business_settings.placeholder.email')"
        :value="$settings->email"
    />

    {{-- Certified Email (PEC) --}}
    <x-form-input
        type="email"
        name="certified_email"
        :label="__('business_settings.certified_email')"
        :placeholder="__('business_settings.placeholder.certified_email')"
        :value="$settings->certified_email"
    />

    <div class="grid grid-cols-1 md:grid-cols-4 gap-6">
        
        {{-- Phone Prefix --}}
        <x-form-input
            name="phone_prefix"
            :label="__('business_settings.phone_prefix')"
            :placeholder="__('business_settings.placeholder.phone_prefix')"
            :value="$settings->phone_prefix"
        />

        {{-- Phone --}}
        <div class="md:col-span-3">
            <x-form-input
                name="phone"
                :label="__('business_settings.phone')"
                :placeholder="__('business_settings.placeholder.phone')"
                :value="$settings->phone"
            />
        </div>

    </div>

</div>