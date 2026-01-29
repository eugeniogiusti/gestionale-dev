<div class="summary">
    <div class="summary-title">{{ __('statistics.financial_summary') }}</div>

    {{-- Financial Stats --}}
    <div class="summary-grid">
        <div class="summary-row">
            <div class="summary-cell">
                <div class="summary-label">{{ __('statistics.payments') }}</div>
                <div class="summary-value">{{ number_format($stats['summary']['payments'], 2, ',', '.') }} &euro;</div>
            </div>
            <div class="summary-cell">
                <div class="summary-label">{{ __('statistics.costs') }}</div>
                <div class="summary-value">{{ number_format($stats['summary']['costs'], 2, ',', '.') }} &euro;</div>
            </div>
            <div class="summary-cell">
                <div class="summary-label">{{ __('statistics.profit') }}</div>
                <div class="summary-value {{ $stats['summary']['profit'] >= 0 ? 'positive' : 'negative' }}">
                    {{ $stats['summary']['profit'] >= 0 ? '+' : '' }}{{ number_format($stats['summary']['profit'], 2, ',', '.') }} &euro;
                </div>
            </div>
            <div class="summary-cell">
                <div class="summary-label">{{ __('statistics.pending') }}</div>
                <div class="summary-value">{{ number_format($stats['summary']['pending'], 2, ',', '.') }} &euro;</div>
            </div>
        </div>
    </div>

    {{-- Operational Stats --}}
    <div class="summary-grid" style="margin-top: 10px;">
        <div class="summary-row">
            <div class="summary-cell">
                <div class="summary-label">{{ __('statistics.projects_started') }}</div>
                <div class="summary-value">{{ $stats['summary']['projects_started'] }}</div>
            </div>
            <div class="summary-cell">
                <div class="summary-label">{{ __('statistics.projects_completed') }}</div>
                <div class="summary-value">{{ $stats['summary']['projects_completed'] }}</div>
            </div>
            <div class="summary-cell">
                <div class="summary-label">{{ __('statistics.tasks_completed') }}</div>
                <div class="summary-value">{{ $stats['summary']['tasks_completed'] }}</div>
            </div>
            <div class="summary-cell">
                <div class="summary-label">{{ __('statistics.new_clients') }}</div>
                <div class="summary-value">{{ $stats['summary']['new_clients'] }}</div>
            </div>
        </div>
    </div>
</div>
