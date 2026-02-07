<?php

namespace App\Http\Requests\Payments;

use App\Models\BusinessSettings;
use Illuminate\Foundation\Http\FormRequest;

class StorePaymentRequest extends FormRequest
{
        protected function prepareForValidation()
    {
        // if paid_at is not provided, set method to null
        if (!$this->paid_at) {
            $this->merge(['method' => null]);
        }

        $this->merge([
            'currency' => BusinessSettings::current()->default_currency ?? 'EUR',
        ]);
    }

    public function rules(): array
    {
        return [
            'amount' => ['required', 'numeric', 'min:0.01', 'max:999999.99'],
            'currency' => ['required', 'string', 'size:3'],
            'paid_at' => ['nullable', 'date'],
            'due_date' => ['required_without:paid_at', 'nullable', 'date'],
            'method' => ['nullable', 'required_with:paid_at', 'in:cash,bank,stripe,paypal'],
            'reference' => ['nullable', 'string', 'max:255'],
            'notes' => ['nullable', 'string'],
        ];
    }

    public function messages(): array
    {
        return [
            'amount.required' => __('payments.amount_required'),
            'amount.min' => __('payments.amount_min'),
            'due_date.required_without' => __('payments.due_date_required_when_unpaid'),
            'method.required' => __('payments.method_required'),
            'currency.in' => __('payments.currency_invalid'),
        ];
    }
}