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

    {{-- ⬅️ PAYMENT INSTRUCTIONS --}}
    @if($business->iban)
        <div class="payment-instructions">
            <div class="payment-title">{{ __('invoices.payment_method') }}</div>
            <div class="payment-text">
                {{ __('invoices.payment_instruction') }}
            </div>
            <div class="payment-iban">
                <strong>IBAN:</strong> {{ $business->iban }}
            </div>
        </div>
    @endif
</div>