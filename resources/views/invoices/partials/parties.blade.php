<div class="parties">
    <div class="from-col">
        <div class="party-line"><strong>{{ $business->owner_last_name }} {{ $business->owner_first_name }}</strong></div>
        <div class="party-line">{{ $business->legal_address }}</div>
        <div class="party-line">{{ $business->legal_zip }} {{ $business->legal_city }} ({{ $business->legal_province }})</div>
        <div class="party-line">{{ __('invoices.tax_code') }}: {{ $business->tax_id }}</div>
        <div class="party-line">{{ __('invoices.vat_number') }}: {{ $business->vat_number }}</div>
    </div>
    
    <div class="to-col">
        <div class="to-label">{{ __('invoices.recipient') }}:</div>
        @if($client)
            <div class="party-line"><strong>{{ $client->name }}</strong></div>
            <div class="party-line">{{ $client->billing_address }}</div>
            <div class="party-line">{{ $client->billing_zip }} {{ $client->billing_city }} ({{ $client->billing_province }})</div>
            @if($client->vat_number)
                <div class="party-line">{{ __('invoices.vat_number') }}: {{ $client->vat_number }}</div>
            @endif
        @else
            <div class="party-line"><strong>{{ $project->name }}</strong></div>
            <div class="party-line text-gray-500">{{ __('invoices.no_client') }}</div>
        @endif
    </div>
</div>