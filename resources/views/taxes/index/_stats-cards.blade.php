{{-- Stats Cards --}}
<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-6">
    @include('taxes.index.stats-cards._total-all-time')
    @include('taxes.index.stats-cards._this-year')
    @include('taxes.index.stats-cards._unpaid')
    @include('taxes.index.stats-cards._count-this-year')
</div>
