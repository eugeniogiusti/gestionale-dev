<?php

namespace App\Http\Requests\Invoices;

use Illuminate\Foundation\Http\FormRequest;

class UploadInvoiceRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'invoice' => ['required', 'file', 'mimes:pdf', 'max:10240'], // 10MB max
        ];
    }

    public function messages(): array
    {
        return [
            'invoice.required' => __('invoices.file_required'),
            'invoice.file' => __('invoices.must_be_file'),
            'invoice.mimes' => __('invoices.must_be_pdf'),
            'invoice.max' => __('invoices.max_size'),
        ];
    }
}