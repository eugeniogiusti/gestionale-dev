<div class="amount-section">
    {{ __('invoices.amount_of') }} <strong>{{ $payment->getFormattedAmount() }}</strong>
    @if($due_date)
        - {{ __('invoices.due_on') }} <strong>{{ $due_date }}</strong>
    @endif
</div>