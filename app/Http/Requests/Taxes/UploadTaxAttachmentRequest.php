<?php

namespace App\Http\Requests\Taxes;

use Illuminate\Foundation\Http\FormRequest;

class UploadTaxAttachmentRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'attachment' => ['required', 'file', 'mimes:pdf,jpg,jpeg,png', 'max:10240'],
        ];
    }

    public function messages(): array
    {
        return [
            'attachment.required' => __('taxes.attachment_required'),
            'attachment.mimes'    => __('taxes.attachment_mimes'),
            'attachment.max'      => __('taxes.attachment_max'),
        ];
    }
}
