<?php

namespace App\Http\Requests\Costs;

use App\Models\Cost;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateCostRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'amount' => ['required', 'numeric', 'min:0.01', 'max:999999.99'],
            'currency' => ['required', 'string', 'size:3', Rule::in(array_keys(Cost::CURRENCIES))],
            'type' => ['required', Rule::in(Cost::TYPES)],
            'recurring' => ['nullable', 'boolean'],
            'recurring_period' => ['nullable', 'required_if:recurring,1', Rule::in(Cost::RECURRING_PERIODS)],
            'paid_at' => ['required', 'date'],
            'receipt_path' => ['nullable', 'string', 'max:255'],
            'notes' => ['nullable', 'string'],
        ];
    }

    public function messages(): array
    {
        return [
            'amount.required' => __('costs.amount_required'),
            'amount.min' => __('costs.amount_min'),
            'type.required' => __('costs.type_required'),
            'paid_at.required' => __('costs.paid_at_required'),
            'currency.in' => __('costs.currency_invalid'),
            'recurring_period.required_if' => __('costs.recurring_period_required'),
        ];
    }
}
