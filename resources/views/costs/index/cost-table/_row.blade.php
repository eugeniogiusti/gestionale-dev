{{-- Table Row --}}
<tr class="hover:bg-gray-50 dark:hover:bg-gray-700 transition">
    @include('costs.index.cost-table._row-project')
    @include('costs.index.cost-table._row-amount')
    @include('costs.index.cost-table._row-type')
    @include('costs.index.cost-table._row-paid-at')
    @include('costs.index.cost-table._row-receipt')
    @include('costs.index.cost-table._row-actions')
</tr>