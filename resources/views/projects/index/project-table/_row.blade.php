{{-- Table Row --}}
<tr class="hover:bg-gray-50 dark:hover:bg-gray-700 transition">
    @include('projects.index.project-table._row-name')
    @include('projects.index.project-table._row-client')
    @include('projects.index.project-table._row-status')
    @include('projects.index.project-table._row-priority')
    @include('projects.index.project-table._row-links')
    @include('projects.index.project-table._row-created-at')
    @include('projects.index.project-table._row-actions')
</tr>