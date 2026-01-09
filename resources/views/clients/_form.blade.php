{{-- resources/views/clients/_form.blade.php --}}

{{-- TAB 1: BASIC INFO --}}
<div x-show="activeTab === 'basic'" class="space-y-6">
    
    {{-- Name and Email --}}
    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
        <x-form-input
            name="name"
            :label="__('clients.name')"
            :placeholder="__('clients.placeholder.name')"
            :value="$client->name ?? ''"
            required
        />

        <x-form-input
            name="email"
            type="email"
            :label="__('clients.email')"
            :placeholder="__('clients.placeholder.email')"
            :value="$client->email ?? ''"
            required
        />
    </div>

    {{-- Status and VAT Number --}}
    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
        <x-form-select
            name="status"
            :label="__('clients.status')"
            :value="$client->status ?? 'lead'"
            :options="[
                'lead' => __('clients.status_lead'),
                'active' => __('clients.status_active'),
                'archived' => __('clients.status_archived'),
            ]"
            required
        />

        <x-form-input
            name="vat_number"
            :label="__('clients.vat_number')"
            :placeholder="__('clients.placeholder.vat_number')"
            :value="$client->vat_number ?? ''"
        />
    </div>

    {{-- Phone --}}
    <div class="grid grid-cols-1 md:grid-cols-4 gap-6">
        <x-form-select
            name="phone_prefix"
            :label="__('clients.phone_prefix')"
            :value="$client->phone_prefix ?? ''"
            :options="[
                '' => __('clients.phone_prefix'),
                '+39' => '🇮🇹 +39',
                '+1' => '🇺🇸 +1',
                '+44' => '🇬🇧 +44',
                '+33' => '🇫🇷 +33',
                '+49' => '🇩🇪 +49',
                '+34' => '🇪🇸 +34',
            ]"
        />

        <div class="md:col-span-3">
            <x-form-input
                name="phone"
                type="tel"
                :label="__('clients.phone')"
                :placeholder="__('clients.placeholder.phone')"
                :value="$client->phone ?? ''"
            />
        </div>
    </div>

    {{-- PEC --}}
    <x-form-input
        name="pec"
        type="email"
        :label="__('clients.pec')"
        :placeholder="__('clients.placeholder.pec')"
        :value="$client->pec ?? ''"
    />
</div>

{{-- TAB 2: BILLING INFO --}}
<div x-show="activeTab === 'billing'" class="space-y-6">
    
    {{-- Address --}}
    <x-form-input
        name="billing_address"
        :label="__('clients.billing_address')"
        :placeholder="__('clients.placeholder.billing_address')"
        :value="$client->billing_address ?? ''"
    />

    {{-- City, ZIP, Province --}}
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
        <x-form-input
            name="billing_city"
            :label="__('clients.billing_city')"
            :placeholder="__('clients.placeholder.billing_city')"
            :value="$client->billing_city ?? ''"
        />

        <x-form-input
            name="billing_zip"
            :label="__('clients.billing_zip')"
            :placeholder="__('clients.placeholder.billing_zip')"
            :value="$client->billing_zip ?? ''"
        />

        <x-form-input
            name="billing_province"
            :label="__('clients.billing_province')"
            :placeholder="__('clients.placeholder.billing_province')"
            :value="$client->billing_province ?? ''"
            :hint="__('clients.hint.billing_province')"
        />
    </div>

    {{-- Country and Recipient Code --}}
    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
        <x-form-input
            name="billing_country"
            :label="__('clients.billing_country')"
            :placeholder="__('clients.placeholder.billing_country')"
            :value="$client->billing_country ?? ''"
            :hint="__('clients.hint.billing_country')"
            maxlength="2"
        />

        <x-form-input
            name="billing_recipient_code"
            :label="__('clients.billing_recipient_code')"
            :placeholder="__('clients.placeholder.billing_recipient_code')"
            :value="$client->billing_recipient_code ?? ''"
            :hint="__('clients.hint.billing_recipient_code')"
            maxlength="7"
        />
    </div>
</div>

{{-- TAB 3: WEB & NOTES --}}
<div x-show="activeTab === 'web'" class="space-y-6">
    
    {{-- Website and LinkedIn --}}
    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
        <x-form-input
            name="website"
            type="url"
            :label="__('clients.website')"
            :placeholder="__('clients.placeholder.website')"
            :value="$client->website ?? ''"
        />

        <x-form-input
            name="linkedin"
            type="url"
            :label="__('clients.linkedin')"
            :placeholder="__('clients.placeholder.linkedin')"
            :value="$client->linkedin ?? ''"
        />
    </div>

    {{-- Notes --}}
    <x-form-textarea
        name="notes"
        :label="__('clients.notes')"
        :placeholder="__('clients.placeholder.notes')"
        :value="$client->notes ?? ''"
        rows="6"
    />
</div>