<div class="space-y-6">
    
    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
        
        {{-- First Name --}}
        <x-form-input
            name="owner_first_name"
            :label="__('business_settings.owner_first_name')"
            :placeholder="__('business_settings.placeholder.owner_first_name')"
            :value="$settings->owner_first_name"
        />

        {{-- Last Name --}}
        <x-form-input
            name="owner_last_name"
            :label="__('business_settings.owner_last_name')"
            :placeholder="__('business_settings.placeholder.owner_last_name')"
            :value="$settings->owner_last_name"
        />

    </div>

</div>