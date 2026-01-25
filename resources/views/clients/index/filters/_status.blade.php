{{-- Status Filter --}}
<div>
    <x-form-select
        name="status"
        :value="request('status')"
        :options="[
            '' => __('clients.all_statuses'),
            'lead' => __('clients.status_lead'),
            'active' => __('clients.status_active'),
            'archived' => __('clients.status_archived'),
        ]"
    />
</div>