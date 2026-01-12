<?php

namespace App\Http\Requests;

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
            'one_time_password.required' => 'Il codice è obbligatorio.',
            'one_time_password.size' => 'Il codice deve essere di 6 cifre.',
        ];
    }
}