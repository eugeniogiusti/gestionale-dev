<?php

namespace App\Http\Requests\TwoFactor;

use Illuminate\Foundation\Http\FormRequest;

class ConfirmTwoFactorRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'one_time_password' => ['required', 'string', 'size:6'],
        ];
    }

    public function messages(): array
    {
        return [
            'one_time_password.required' => __('two_factor.code_required'),
            'one_time_password.size' => __('two_factor.code_must_be_6_digits'),
        ];
    }
}