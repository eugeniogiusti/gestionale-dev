{{-- Stats Cards - Payments --}}
<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-6">
    @include('payments.index.stats-cards._total-all-time')
    @include('payments.index.stats-cards._this-month')
    @include('payments.index.stats-cards._this-year')
    @include('payments.index.stats-cards._by-currency')
</div>