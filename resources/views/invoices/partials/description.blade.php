<div class="description-section">
    <div class="section-title">{{ __('invoices.description') }}</div>
    <div class="divider"></div>
    
    <div class="description-row">
        <div class="description-text">
            {{ $payment->notes ?: __('invoices.payment') }}
        </div>
        <div class="description-amount">
            {{ __('invoices.default_currency') }} {{ number_format($payment->amount, 2, ',', '.') }}
        </div>
    </div>
    
    <div class="divider"></div>
</div>