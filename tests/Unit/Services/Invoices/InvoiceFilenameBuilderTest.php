<?php

use App\Models\Payment;
use App\Services\Invoices\Generators\InvoiceFilenameBuilder;

test('filename builder uses payment reference when available', function () {
    $payment = Payment::factory()->make([
        'reference' => 'INV-2024-001',
    ]);

    $builder = new InvoiceFilenameBuilder();
    $filename = $builder->build($payment);

    $translatedInvoice = __('invoices.invoice');
    expect($filename)->toBe("{$translatedInvoice}-INV-2024-001.pdf");
});

test('filename builder uses payment id when reference is null', function () {
    $payment = Payment::factory()->make([
        'id' => 123,
        'reference' => null,
    ]);

    $builder = new InvoiceFilenameBuilder();
    $filename = $builder->build($payment);

    $translatedInvoice = __('invoices.invoice');
    expect($filename)->toBe("{$translatedInvoice}-123.pdf");
});

test('filename builder uses translation system', function () {
    $payment = Payment::factory()->make(['reference' => 'TEST']);

    $builder = new InvoiceFilenameBuilder();

    // Test with Italian locale
    app()->setLocale('it');
    $filenameIt = $builder->build($payment);
    expect($filenameIt)->toStartWith('Fattura-');

    // Test with English locale
    app()->setLocale('en');
    $filenameEn = $builder->build($payment);
    expect($filenameEn)->toStartWith('Invoice-');
});

test('filename always ends with .pdf extension', function () {
    $payment = Payment::factory()->make(['reference' => 'TEST-123']);

    $builder = new InvoiceFilenameBuilder();
    $filename = $builder->build($payment);

    expect($filename)->toEndWith('.pdf');
});
