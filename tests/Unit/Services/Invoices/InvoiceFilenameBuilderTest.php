<?php

use App\Models\Payment;
use App\Services\Invoices\Generators\InvoiceFilenameBuilder;

test('filename builder creates standard format with padded number and year', function () {
    $payment = Payment::factory()->make([
        'id' => 7,
        'created_at' => now()->setYear(2026),
    ]);

    $builder = new InvoiceFilenameBuilder();
    $filename = $builder->build($payment);

    $translatedInvoice = __('invoices.invoice');
    expect($filename)->toBe("{$translatedInvoice}-007-2026.pdf");
});

test('filename builder pads id to 3 digits', function () {
    $payment = Payment::factory()->make([
        'id' => 42,
        'created_at' => now()->setYear(2026),
    ]);

    $builder = new InvoiceFilenameBuilder();
    $filename = $builder->build($payment);

    expect($filename)->toContain('-042-');
});

test('filename builder uses original file extension when path provided', function () {
    $payment = Payment::factory()->make([
        'id' => 1,
        'created_at' => now()->setYear(2026),
    ]);

    $builder = new InvoiceFilenameBuilder();

    $pdfFilename = $builder->build($payment, 'invoices/test.pdf');
    expect($pdfFilename)->toEndWith('.pdf');

    $jpgFilename = $builder->build($payment, 'invoices/test.jpg');
    expect($jpgFilename)->toEndWith('.jpg');

    $pngFilename = $builder->build($payment, 'invoices/test.png');
    expect($pngFilename)->toEndWith('.png');
});

test('filename builder defaults to pdf when no path provided', function () {
    $payment = Payment::factory()->make([
        'id' => 1,
        'created_at' => now()->setYear(2026),
    ]);

    $builder = new InvoiceFilenameBuilder();
    $filename = $builder->build($payment);

    expect($filename)->toEndWith('.pdf');
});

test('filename builder uses translation system', function () {
    $payment = Payment::factory()->make([
        'id' => 1,
        'created_at' => now()->setYear(2026),
    ]);

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
