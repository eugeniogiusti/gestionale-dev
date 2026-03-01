<style>
    @font-face {
        font-family: 'Noto Sans CJK';
        font-style: normal;
        font-weight: normal;
        src: url('{{ storage_path('fonts/NotoSansCJKsc-Regular.ttf') }}') format('truetype');
    }

    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }

    body {
        font-family: 'DejaVu Sans', 'Noto Sans CJK', sans-serif;
        font-size: 11pt;
        color: #333;
        line-height: 1.6;
        padding: 40px;
    }
    
    .header {
        margin-bottom: 30px;
    }
    
    .header-row {
        display: table;
        width: 100%;
        margin-bottom: 20px;
    }
    
    .logo-col {
        display: table-cell;
        width: 50%;
        vertical-align: top;
    }
    
    .logo-col img {
        max-width: 150px;
        max-height: 80px;
    }
    
    .invoice-col {
        display: table-cell;
        width: 50%;
        text-align: right;
        vertical-align: top;
    }
    
    .invoice-number {
        font-size: 16pt;
        font-weight: bold;
    }
    
    .invoice-date {
        font-size: 11pt;
        color: #666;
        margin-top: 3px;
    }
    
    .parties {
        display: table;
        width: 100%;
        margin-bottom: 30px;
    }
    
    .from-col {
        display: table-cell;
        width: 50%;
        vertical-align: top;
        padding-right: 20px;
    }
    
    .to-col {
        display: table-cell;
        width: 50%;
        vertical-align: top;
        padding-left: 20px;
    }
    
    .to-label {
        font-weight: bold;
        margin-bottom: 5px;
    }
    
    .party-line {
        margin: 3px 0;
        font-size: 10pt;
    }
    
    .amount-section {
        margin: 25px 0;
        padding: 15px;
        text-align: center;
        font-size: 12pt;
    }
    
    .description-section {
        margin-top: 20px;
    }
    
    .section-title {
        font-weight: bold;
        margin-bottom: 10px;
    }
    
    .divider {
        border-top: 1px solid #333;
        margin: 10px 0;
    }
    
    .description-row {
        display: table;
        width: 100%;
        padding: 15px 0;
    }
    
    .description-text {
        display: table-cell;
        width: 70%;
        vertical-align: middle;
        font-size: 9pt;
    }
    
    .description-amount {
        display: table-cell;
        width: 30%;
        text-align: right;
        vertical-align: middle;
        font-size: 14pt;
        font-weight: bold;
    }

    .payment-instructions {
        margin-top: 20px;
        padding: 15px;
        background-color: #f9f9f9;
        border: 1px solid #ddd;
        border-radius: 4px;
    }

    .payment-title {
        font-weight: bold;
        font-size: 10pt;
        margin-bottom: 8px;
        color: #333;
    }

    .payment-text {
        font-size: 9pt;
        color: #666;
        margin-bottom: 10px;
        line-height: 1.4;
    }

    .payment-iban {
        font-size: 10pt;
        color: #333;
        padding: 8px;
        background-color: #fff;
        border: 1px solid #ddd;
        border-radius: 3px;
    }
    
    .footer {
        margin-top: 30px;
        font-size: 8pt;
        color: #666;
    }
</style>