<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>{{ __('quotes.quote') }} {{ $quote->quote_number }}</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        
        body {
            font-family: 'DejaVu Sans', sans-serif;
            font-size: 10pt;
            line-height: 1.5;
            color: #1f2937;
        }

        .container {
            padding: 30px 40px;
        }

        /* Header with Logo and Quote Number */
        .header {
            margin-bottom: 30px;
        }

        .header-row {
            display: table;
            width: 100%;
        }

        .logo-col {
            display: table-cell;
            width: 60%;
            vertical-align: top;
        }

        .logo-col img {
            max-height: 50px;
            max-width: 200px;
        }

        .quote-col {
            display: table-cell;
            width: 40%;
            vertical-align: top;
            text-align: right;
        }

        .quote-number {
            font-size: 18pt;
            font-weight: bold;
            color: #059669;
            margin-bottom: 5px;
        }

        .quote-date {
            font-size: 9pt;
            color: #6b7280;
        }

        /* Business and Client Info */
        .info-section {
            margin: 25px 0;
        }

        .info-row {
            display: table;
            width: 100%;
            margin-bottom: 20px;
        }

        .info-col {
            display: table-cell;
            width: 50%;
            vertical-align: top;
            padding-right: 20px;
        }

        .info-title {
            font-size: 9pt;
            font-weight: bold;
            color: #6b7280;
            text-transform: uppercase;
            margin-bottom: 8px;
            letter-spacing: 0.5px;
        }

        .info-box {
            font-size: 9pt;
            line-height: 1.6;
        }

        .info-box strong {
            font-size: 10pt;
            color: #111827;
        }

        /* Quote Details */
        .quote-details {
            background: #f9fafb;
            padding: 12px 15px;
            border-radius: 4px;
            margin: 20px 0;
            border-left: 3px solid #059669;
        }

        .detail-row {
            display: table;
            width: 100%;
            margin-bottom: 6px;
        }

        .detail-row:last-child {
            margin-bottom: 0;
        }

        .detail-label {
            display: table-cell;
            width: 30%;
            font-size: 9pt;
            color: #6b7280;
        }

        .detail-value {
            display: table-cell;
            font-size: 9pt;
            font-weight: 600;
            color: #111827;
        }

        /* Quote Title */
        .quote-title {
            font-size: 14pt;
            font-weight: bold;
            color: #111827;
            margin: 25px 0 15px 0;
            padding-bottom: 10px;
            border-bottom: 2px solid #e5e7eb;
        }

        /* Items Table */
        .items-table {
            width: 100%;
            border-collapse: collapse;
            margin: 20px 0;
        }

        .items-table thead {
            background: #111827;
            color: white;
        }

        .items-table th {
            padding: 10px 12px;
            text-align: left;
            font-size: 9pt;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        .items-table td {
            padding: 10px 12px;
            border-bottom: 1px solid #e5e7eb;
            font-size: 9pt;
        }

        .items-table tbody tr:last-child td {
            border-bottom: 2px solid #111827;
        }

        .text-right {
            text-align: right;
        }

        /* Total Section */
        .total-section {
            margin-top: 20px;
            text-align: right;
        }

        .total-box {
            display: inline-block;
            background: #111827;
            color: white;
            padding: 15px 25px;
            border-radius: 4px;
            min-width: 250px;
        }

        .total-label {
            font-size: 10pt;
            margin-bottom: 5px;
        }

        .total-amount {
            font-size: 20pt;
            font-weight: bold;
        }

        /* Payment Section */
        .payment-section {
            margin-top: 30px;
            clear: both;
        }

        .section-title {
            font-size: 10pt;
            font-weight: bold;
            color: #111827;
            margin-bottom: 10px;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        .payment-box {
            background: #f9fafb;
            padding: 12px 15px;
            border-radius: 4px;
            margin: 8px 0;
            font-size: 9pt;
            line-height: 1.6;
        }

        /* Notes */
        .notes-section {
            margin-top: 25px;
            padding: 12px 15px;
            background: #fef3c7;
            border-left: 3px solid #f59e0b;
            border-radius: 4px;
        }

        .notes-section p {
            font-size: 9pt;
            line-height: 1.6;
            color: #78350f;
        }

        /* Footer */
        .footer {
            margin-top: 40px;
            padding-top: 15px;
            border-top: 1px solid #e5e7eb;
            text-align: center;
            font-size: 8pt;
            color: #9ca3af;
        }

        /* Validity Badge */
        .validity-badge {
            display: inline-block;
            background: #fef3c7;
            color: #92400e;
            padding: 8px 12px;
            border-radius: 4px;
            font-size: 9pt;
            font-weight: 600;
            margin: 15px 0;
        }
    </style>
</head>
<body>
    <div class="container">
        
        {{-- Header --}}
        <div class="header">
            <div class="header-row">
                <div class="logo-col">
                    @if($business->logo_path)
                        @php
                            $companyLogoPath = storage_path('app/' . $business->logo_path);
                            if (!file_exists($companyLogoPath)) {
                                $companyLogoPath = storage_path('app/private/' . $business->logo_path);
                            }
                        @endphp
                        @if(file_exists($companyLogoPath))
                            <img src="{{ $companyLogoPath }}" alt="Logo">
                        @endif
                    @endif
                    @if($business->business_name)
                        <div style="margin-top: 3px; font-size: 9pt; color: #666;">
                            {{ $business->business_name }}
                        </div>
                    @endif
                </div>
                <div class="quote-col">
                    <div class="quote-number">{{ __('quotes.quote') }} #{{ $quote->quote_number }}</div>
                    <div class="quote-date">{{ $quote->quote_date->format('d/m/Y') }}</div>
                </div>
            </div>
        </div>

        {{-- Business and Client Info --}}
        <div class="info-section">
            <div class="info-row">
                {{-- Business Info --}}
                <div class="info-col">
                    <div class="info-title">{{ __('quotes.pdf_from') }}</div>
                    <div class="info-box">
                        @if($business->business_name)
                            <strong>{{ $business->business_name }}</strong><br>
                        @endif
                        @if($business->legal_address)
                            {{ $business->legal_address }}<br>
                            @if($business->legal_city)
                                {{ $business->legal_city }} {{ $business->legal_zip }}
                                @if($business->legal_province) ({{ $business->legal_province }})@endif
                                <br>
                            @endif
                        @endif
                        @if($business->vat_number){{ __('quotes.pdf_vat') }}: {{ $business->vat_number }}<br>@endif
                        @if($business->email){{ __('quotes.pdf_email') }}: {{ $business->email }}<br>@endif
                        @if($business->phone){{ __('quotes.pdf_phone') }}: {{ $business->phone_prefix }} {{ $business->phone }}@endif
                    </div>
                </div>

                {{-- Client Info --}}
                <div class="info-col">
                    <div class="info-title">{{ __('quotes.pdf_to') }}</div>
                    <div class="info-box">
                        <strong>{{ $client->name }}</strong><br>
                        @if($client->vat_number){{ __('quotes.pdf_vat') }}: {{ $client->vat_number }}<br>@endif
                        @if($client->billing_address)
                            {{ $client->billing_address }}<br>
                            @if($client->billing_city)
                                {{ $client->billing_city }} {{ $client->billing_zip }}
                                @if($client->billing_province) ({{ $client->billing_province }})@endif
                                <br>
                            @endif
                        @endif
                        @if($client->email){{ __('quotes.pdf_email') }}: {{ $client->email }}<br>@endif
                        @if($client->phone){{ __('quotes.pdf_phone') }}: {{ $client->phone_prefix }} {{ $client->phone }}@endif
                    </div>
                </div>
            </div>
        </div>

        {{-- Quote Details --}}
        <div class="quote-details">
            <div class="detail-row">
                <div class="detail-label">{{ __('quotes.project') }}:</div>
                <div class="detail-value">{{ $project->name }}</div>
            </div>
            @if($quote->expiry_date)
                <div class="detail-row">
                    <div class="detail-label">{{ __('quotes.pdf_valid_until') }}:</div>
                    <div class="detail-value">{{ $quote->expiry_date->format('d/m/Y') }}</div>
                </div>
            @endif
        </div>

        {{-- Quote Title --}}
        <div class="quote-title">{{ $quote->title }}</div>

        {{-- Items Table --}}
        <table class="items-table">
            <thead>
                <tr>
                    <th style="width: 70%;">{{ __('quotes.item_description') }}</th>
                    <th class="text-right" style="width: 30%;">{{ __('quotes.item_price') }}</th>
                </tr>
            </thead>
            <tbody>
                @foreach($quote->items as $item)
                    <tr>
                        <td>{{ $item['description'] }}</td>
                        <td class="text-right">{{ $business->currency_symbol }}{{ number_format($item['price'], 2, ',', '.') }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        {{-- Total --}}
        <div class="total-section">
            <div class="total-box">
                <div class="total-label">{{ __('quotes.total') }}</div>
                <div class="total-amount">{{ $business->currency_symbol }}{{ number_format($quote->total, 2, ',', '.') }}</div>
            </div>
        </div>

        {{-- Payment Terms --}}
        @if($quote->payment_terms || $business->iban)
            <div class="payment-section">
                <div class="section-title">{{ __('quotes.payment_information') }}</div>
                
                @if($quote->payment_terms)
                    <div class="payment-box">
                        <strong>{{ __('quotes.payment_terms') }}:</strong><br>
                        {{ $quote->payment_terms }}
                    </div>
                @endif

                @if($business->iban)
                    <div class="payment-box">
                        <strong>IBAN:</strong> {{ $business->iban }}
                    </div>
                @endif
            </div>
        @endif

        {{-- Notes --}}
        @if($quote->notes)
            <div class="notes-section">
                <strong>{{ __('quotes.notes') }}:</strong><br>
                <p>{{ $quote->notes }}</p>
            </div>
        @endif

        {{-- Footer --}}
        <div class="footer">
            {{ $business->business_name }} - {{ __('quotes.quote') }} {{ $quote->quote_number }}
        </div>

    </div>
</body>
</html>