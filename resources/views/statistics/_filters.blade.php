{{-- Filters --}}
<div class="bg-white dark:bg-gray-800 rounded-xl shadow-sm border border-gray-200 dark:border-gray-700 p-4">
    <div class="flex flex-wrap items-center justify-between gap-4">
        <form method="GET" action="{{ route('statistics.index') }}" class="flex flex-wrap items-center gap-4">
            {{-- Year Select --}}
            <div class="flex items-center gap-2">
                <label for="year" class="text-sm font-medium text-gray-700 dark:text-gray-300">
                    {{ __('statistics.year') }}
                </label>
                <select
                    name="year"
                    id="year"
                    onchange="this.form.submit()"
                    class="rounded-lg border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white text-sm focus:ring-emerald-500 focus:border-emerald-500"
                >
                    @foreach($availableYears as $y)
                        <option value="{{ $y }}" {{ $year == $y ? 'selected' : '' }}>{{ $y }}</option>
                    @endforeach
                </select>
            </div>

            {{-- Month Select --}}
            <div class="flex items-center gap-2">
                <label for="month" class="text-sm font-medium text-gray-700 dark:text-gray-300">
                    {{ __('statistics.month') }}
                </label>
                <select
                    name="month"
                    id="month"
                    onchange="this.form.submit()"
                    class="rounded-lg border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white text-sm focus:ring-emerald-500 focus:border-emerald-500"
                >
                    <option value="">{{ __('statistics.full_year') }}</option>
                    @foreach(range(1, 12) as $m)
                        <option value="{{ $m }}" {{ $month == $m ? 'selected' : '' }}>
                            {{ \Carbon\Carbon::create($year, $m, 1)->translatedFormat('F') }}
                        </option>
                    @endforeach
                </select>
            </div>

            {{-- Reset Button --}}
            @if($month)
                <a href="{{ route('statistics.index', ['year' => $year]) }}"
                   class="text-sm text-gray-500 hover:text-gray-700 dark:text-gray-400 dark:hover:text-gray-200">
                    {{ __('statistics.show_full_year') }}
                </a>
            @endif
        </form>

        {{-- Download PDF --}}
        <a href="{{ route('statistics.export-pdf', ['year' => $year, 'month' => $month]) }}"
           class="inline-flex items-center gap-2 px-4 py-2 bg-emerald-600 hover:bg-emerald-700 text-white text-sm font-medium rounded-lg transition">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
            </svg>
            {{ __('statistics.download_pdf') }}
        </a>
    </div>
</div>
