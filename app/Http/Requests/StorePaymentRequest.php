<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePaymentRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'amount' => ['required', 'numeric', 'min:0.01', 'max:999999.99'],
            'currency' => ['required', 'string', 'size:3', 'in:EUR,USD,GBP,CHF,JPY'],
            'paid_at' => ['required', 'date'],
            'due_date' => ['nullable', 'date', 'after_or_equal:paid_at'],
            'method' => ['required', 'in:cash,bank,stripe,paypal'],
            'reference' => ['nullable', 'string', 'max:255'],
            'notes' => ['nullable', 'string'],
        ];
    }

    public function messages(): array
    {
        return [
            'amount.required' => __('payments.amount_required'),
            'amount.min' => __('payments.amount_min'),
            'paid_at.required' => __('payments.paid_at_required'),
            'due_date.after_or_equal' => __('payments.due_date_invalid'),
            'method.required' => __('payments.method_required'),
            'currency.in' => __('payments.currency_invalid'),
        ];
    }
}