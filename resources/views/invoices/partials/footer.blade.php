<div class="footer">
    <p>{{ __('invoices.currency') }}: {{ $payment->currency }}</p>
    @if($business->invoice_note)
        <p style="margin-top: 6px;">{{ $business->invoice_note }}</p>
    @endif
</div>