<tr class="hover:bg-gray-50 dark:hover:bg-gray-700 transition">
    @include('documents.index.document-table._row-project', ['document' => $document])
    @include('documents.index.document-table._row-name', ['document' => $document])
    @include('documents.index.document-table._row-labels', ['document' => $document])
    @include('documents.index.document-table._row-uploaded-at', ['document' => $document])
    @include('documents.index.document-table._row-actions', ['document' => $document])
</tr>
