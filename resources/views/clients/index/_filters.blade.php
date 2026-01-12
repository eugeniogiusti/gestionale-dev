<div class="bg-white dark:bg-gray-800 rounded-lg shadow-sm p-6">
    <form method="GET" action="{{ route('clients.index') }}" class="space-y-4">
        <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
            
            {{-- Search --}}
            <div>
                <x-form-input
                    name="search"
                    :placeholder="__('clients.placeholder.search')"
                    :value="request('search')"
                />
            </div>

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

            {{-- Actions --}}
            <div class="flex gap-2">
                <x-button type="submit" variant="primary" class="flex-1">
                    {{ __('clients.filter') }}
                </x-button>
                <a href="{{ route('clients.index') }}">
                    <x-button type="button" variant="secondary">
                        {{ __('clients.reset') }}
                    </x-button>
                </a>
            </div>
        </div>
    </form>
</div>