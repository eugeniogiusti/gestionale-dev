{{-- Filters Orchestrator --}}
<div class="bg-white dark:bg-gray-800 rounded-lg shadow-sm p-4">
    <form method="GET" class="grid grid-cols-1 md:grid-cols-3 gap-4">
        @include('documents.index.filters._project')
        @include('documents.index.filters._labels')
        @include('documents.index.filters._search')
    </form>
</div>