{{-- Tabella riutilizzabile per show project --}}
<div class="overflow-x-auto">
    <table class="w-full">
        @include('costs.partials.cost-table._header')

        <tbody class="divide-y divide-gray-200 dark:divide-gray-700">
            @foreach($costs as $cost)
                @include('costs.partials.cost-table._row', ['cost' => $cost])
            @endforeach
        </tbody>
    </table>
</div>
