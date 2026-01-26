{{-- Table Row --}}
<tr class="hover:bg-gray-50 dark:hover:bg-gray-700 transition">
    @include('tasks.index.task-table._row-project')
    @include('tasks.index.task-table._row-title')
    @include('tasks.index.task-table._row-type')
    @include('tasks.index.task-table._row-status')
    @include('tasks.index.task-table._row-priority')
    @include('tasks.index.task-table._row-due-date')
    @include('tasks.index.task-table._row-actions')
</tr>