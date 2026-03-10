<?php

namespace App\Http\Requests\Taxes;

use Illuminate\Foundation\Http\FormRequest;

class StoreTaxRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'description'    => ['required', 'string', 'max:255'],
            'amount'         => ['required', 'numeric', 'min:0.01', 'max:999999.99'],
            'due_date'       => ['required', 'date'],
            'paid_at'        => ['nullable', 'date'],
            'reference_year' => ['required', 'integer', 'min:2000', 'max:2100'],
            'notes'          => ['nullable', 'string'],
        ];
    }

    public function messages(): array
    {
        return [
            'description.required'    => __('taxes.description_required'),
            'amount.required'         => __('taxes.amount_required'),
            'amount.min'              => __('taxes.amount_min'),
            'due_date.required'       => __('taxes.due_date_required'),
            'reference_year.required' => __('taxes.reference_year_required'),
        ];
    }
}
