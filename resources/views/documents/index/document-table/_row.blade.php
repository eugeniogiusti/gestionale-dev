{{-- Table Row --}}
<tr class="hover:bg-gray-50 dark:hover:bg-gray-700 transition">
    @include('documents.index.document-table._row-project')
    @include('documents.index.document-table._row-name')
    @include('documents.index.document-table._row-labels')
    @include('documents.index.document-table._row-uploaded-at')
    @include('documents.index.document-table._row-actions')
</tr>