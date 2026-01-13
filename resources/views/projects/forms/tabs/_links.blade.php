{{-- TAB 2: DEV LINKS --}}
<div x-show="activeTab === 'links'" class="space-y-6">
    
    <x-form-input
        name="repo_url"
        type="text"
        :label="__('projects.repo_url')"
        :placeholder="__('projects.placeholder.repo_url')"
        :value="$project->repo_url ?? ''"
    />

    <x-form-input
        name="staging_url"
        type="text"
        :label="__('projects.staging_url')"
        :placeholder="__('projects.placeholder.staging_url')"
        :value="$project->staging_url ?? ''"
    />

    <x-form-input
        name="production_url"
        type="text"
        :label="__('projects.production_url')"
        :placeholder="__('projects.placeholder.production_url')"
        :value="$project->production_url ?? ''"
    />

    <x-form-input
        name="figma_url"
        type="text"
        :label="__('projects.figma_url')"
        :placeholder="__('projects.placeholder.figma_url')"
        :value="$project->figma_url ?? ''"
    />

    <x-form-input
        name="docs_url"
        type="text"
        :label="__('projects.docs_url')"
        :placeholder="__('projects.placeholder.docs_url')"
        :value="$project->docs_url ?? ''"
    />
</div>