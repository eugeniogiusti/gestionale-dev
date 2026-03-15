<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="UTF-8">
    <title>{{ __('statistics.title') }} - {{ $periodLabel }}</title>
    @include('statistics.pdf.partials._styles')
</head>
<body>
    @include('statistics.pdf.partials._header')
    @include('statistics.pdf.partials._summary')
    @include('statistics.pdf.partials._monthly-table')
    @include('statistics.pdf.partials._top-projects')
    @include('statistics.pdf.partials._monthly-detail')
    @include('statistics.pdf.partials._footer')
</body>
</html>
