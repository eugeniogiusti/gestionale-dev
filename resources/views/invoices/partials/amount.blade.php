<div class="amount-section">
    {{ __('invoices.amount_of') }} <strong>{{ __('invoices.default_currency') }} {{ number_format($payment->amount, 2, ',', '.') }}</strong>
    @if($due_date)
        - {{ __('invoices.due_on') }} <strong>{{ $due_date }}</strong>
    @endif
</div>