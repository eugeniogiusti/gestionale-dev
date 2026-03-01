{{-- Table Row --}}
<tr class="hover:bg-gray-50 dark:hover:bg-gray-700 transition">
    @include('timesheets.index.timesheet-table._row-project')
    @include('timesheets.index.timesheet-table._row-client')
    @include('timesheets.index.timesheet-table._row-period')
    @include('timesheets.index.timesheet-table._row-hours')
    @include('timesheets.index.timesheet-table._row-earnings')
</tr>
