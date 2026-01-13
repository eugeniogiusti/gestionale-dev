@props(['client' => null, 'action', 'method' => 'POST'])

<div 
    x-data="clientForm"
    data-errors="{{ json_encode($errors->messages()) }}"
    class="bg-white dark:bg-gray-800 rounded-lg shadow"
>
    @include('clients.forms._tabs-nav')

    {{-- Form --}}
    <form method="POST" action="{{ $action }}" class="p-6">
        @csrf
        @if($method !== 'POST')
            @method($method)
        @endif
        
        @include('clients.forms._fields', ['client' => $client])

        @include('clients.forms._actions')
    </form>
</div>