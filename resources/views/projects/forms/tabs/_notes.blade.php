{{-- TAB 3: NOTES --}}
<div x-show="activeTab === 'notes'" class="space-y-6">
    
    <x-form-textarea
        name="notes"
        :label="__('projects.notes')"
        :placeholder="__('projects.placeholder.notes')"
        :value="$project->notes ?? ''"
        rows="8"
    />
</div>