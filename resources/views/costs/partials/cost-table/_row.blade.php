<tr class="hover:bg-gray-50 dark:hover:bg-gray-700 transition">
    @include('costs.partials.cost-table._row-amount', ['cost' => $cost])
    @include('costs.partials.cost-table._row-type', ['cost' => $cost])
    @include('costs.partials.cost-table._row-paid-at', ['cost' => $cost])
    @include('costs.partials.cost-table._row-receipt', ['cost' => $cost])
    @include('costs.partials.cost-table._row-actions', ['cost' => $cost])
</tr>
