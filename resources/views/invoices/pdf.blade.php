<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>{{ __('invoices.invoice') }} {{ $invoice_number }}</title>
    @include('invoices.partials.styles')
</head>
<body>
    @include('invoices.partials.header')
    @include('invoices.partials.parties')
    @include('invoices.partials.amount')
    @include('invoices.partials.description')
    @include('invoices.partials.footer')
</body>
</html>