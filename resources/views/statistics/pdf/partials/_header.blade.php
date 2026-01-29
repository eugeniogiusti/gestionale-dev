<div class="header">
    <div class="header-top">
        <div class="header-left">
            <div class="company-name">{{ config('app.name') }}</div>
        </div>
        <div class="header-right">
            <div class="report-title">{{ __('statistics.title') }}</div>
            <div class="report-period">{{ $periodLabel }}</div>
            <div class="report-date">{{ $generatedAt->translatedFormat('d/m/Y H:i') }}</div>
        </div>
    </div>
</div>
