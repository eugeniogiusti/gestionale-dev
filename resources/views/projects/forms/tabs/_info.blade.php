{{-- TAB 1: INFO BASE --}}
<div x-show="activeTab === 'info'" class="space-y-6">
    
    {{-- Name --}}
    <x-form-input
        name="name"
        :label="__('projects.name')"
        :placeholder="__('projects.placeholder.name')"
        :value="$project->name ?? ''"
        required
    />

    {{-- Project Type --}}
    <x-form-select
        name="type"
        :label="__('projects.type')"
        :value="$project->type ?? 'client_work'"
        :options="[
            'client_work' => __('projects.type_client_work'),
            'product' => __('projects.type_product'),
            'content' => __('projects.type_content'),
            'asset' => __('projects.type_asset'),
        ]"
        required
    />

    {{-- Client Search --}}
    <div x-data="clientSearch(
    {{ isset($project->client) ? $project->client->id : 'null' }}, 
    {{ isset($project->client) ? '\'' . addslashes($project->client->name) . '\'' : 'null' }}
    )">
        {{-- ... client search completo ... --}}
    </div>

    {{-- Description --}}
    <x-form-textarea
        name="description"
        :label="__('projects.description')"
        :placeholder="__('projects.placeholder.description')"
        :value="$project->description ?? ''"
        rows="4"
    />

    {{-- Status, Priority e Date --}}
    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
        <x-form-select
            name="status"
            :label="__('projects.status')"
            :value="$project->status ?? 'draft'"
            :options="[
                'draft' => __('projects.status_draft'),
                'in_progress' => __('projects.status_in_progress'),
                'completed' => __('projects.status_completed'),
                'archived' => __('projects.status_archived'),
            ]"
            required
        />

        <x-form-select
            name="priority"
            :label="__('projects.priority')"
            :value="$project->priority ?? ''"
            :options="[
                'low' => __('projects.priority_low'),
                'medium' => __('projects.priority_medium'),
                'high' => __('projects.priority_high'),
            ]"
        />
    </div>

    {{-- Dates --}}
    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
        <x-form-input
            name="start_date"
            type="date"
            :label="__('projects.start_date')"
            :value="isset($project->start_date) ? $project->start_date->format('Y-m-d') : ''"
        />

        <x-form-input
            name="due_date"
            type="date"
            :label="__('projects.due_date')"
            :value="isset($project->due_date) ? $project->due_date->format('Y-m-d') : ''"
        />
    </div>
</div>