<?php

namespace App\Http\Requests\Receipts;

use Illuminate\Foundation\Http\FormRequest;

class UploadReceiptRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'receipt' => ['required', 'file', 'mimes:pdf,jpg,jpeg,png', 'max:5120'], // 5MB max
        ];
    }

    public function messages(): array
    {
        return [
            'receipt.required' => __('receipts.file_required'),
            'receipt.file' => __('receipts.must_be_file'),
            'receipt.mimes' => __('receipts.must_be_valid_format'),
            'receipt.max' => __('receipts.max_size'),
        ];
    }
}
