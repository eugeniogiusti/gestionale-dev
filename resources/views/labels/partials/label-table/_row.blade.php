{{-- Table Row --}}
<tr class="hover:bg-gray-50 dark:hover:bg-gray-700 transition">
    @include('labels.partials.label-table._row-name')
    @include('labels.partials.label-table._row-color')
    @include('labels.partials.label-table._row-documents-count')
    @include('labels.partials.label-table._row-actions')
</tr>