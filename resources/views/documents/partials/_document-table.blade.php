{{-- Tabella riutilizzabile per show project --}}
<div class="overflow-x-auto">
    <table class="w-full">
        @include('documents.partials.document-table._header')

        <tbody class="divide-y divide-gray-200 dark:divide-gray-700">
            @foreach($documents as $document)
                @include('documents.partials.document-table._row', ['document' => $document])
            @endforeach
        </tbody>
    </table>
</div>
