@props(['client' => null, 'action', 'method' => 'POST'])

<div 
    x-data="{ 
        activeTab: 'basic',
        errors: {{ json_encode($errors->messages()) }},
        hasErrors(tab) {
            const errorFields = {
                'basic': ['name', 'email', 'status', 'vat_number', 'phone', 'phone_prefix'],
                'billing': ['billing_address', 'billing_city', 'billing_zip', 'billing_province', 'billing_country', 'billing_recipient_code', 'pec'],
                'web': ['website', 'linkedin', 'notes']
            };
            return errorFields[tab]?.some(field => this.errors[field]) || false;
        }
    }"
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