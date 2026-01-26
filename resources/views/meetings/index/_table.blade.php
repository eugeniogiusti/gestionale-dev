{{-- Table Orchestrator --}}
<div class="bg-white dark:bg-gray-800 rounded-lg shadow-sm overflow-hidden">
    <div class="overflow-x-auto">
        <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700">
            @include('meetings.index.meeting-table._header')

            <tbody class="bg-white dark:bg-gray-800 divide-y divide-gray-200 dark:divide-gray-700">
                @foreach($meetings as $meeting)
                    @include('meetings.index.meeting-table._row')
                @endforeach
            </tbody>
        </table>
    </div>

    {{-- Pagination --}}
    <div class="px-6 py-4 border-t border-gray-200 dark:border-gray-700">
        {{ $meetings->links() }}
    </div>
</div>