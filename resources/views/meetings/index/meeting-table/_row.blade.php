{{-- Table Row --}}
<tr class="hover:bg-gray-50 dark:hover:bg-gray-700 transition">
    @include('meetings.index.meeting-table._row-project')
    @include('meetings.index.meeting-table._row-title')
    @include('meetings.index.meeting-table._row-scheduled-at')
    @include('meetings.index.meeting-table._row-duration')
    @include('meetings.index.meeting-table._row-location')
    @include('meetings.index.meeting-table._row-status')
    @include('meetings.index.meeting-table._row-actions')
</tr>