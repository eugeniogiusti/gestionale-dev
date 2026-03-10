<x-app-layout>
    <div class="space-y-6">

        @include('taxes.index._header')

        @include('taxes.index._stats-cards')

        @include('taxes.index._filters')

        @if($taxes->count() > 0)
            @include('taxes.index._table')
        @else
            @include('taxes.index._empty-state')
        @endif

    </div>

    @include('taxes.partials._modal-form')
    @include('taxes.partials._upload-attachment-modal')

</x-app-layout>
