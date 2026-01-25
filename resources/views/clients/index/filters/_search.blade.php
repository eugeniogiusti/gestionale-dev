{{-- Search Filter --}}
<div>
    <x-form-input
        name="search"
        :placeholder="__('clients.placeholder.search')"
        :value="request('search')"
    />
</div>