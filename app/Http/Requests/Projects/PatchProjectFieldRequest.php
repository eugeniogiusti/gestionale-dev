<?php

namespace App\Http\Requests\Projects;

use Illuminate\Foundation\Http\FormRequest;

class PatchProjectFieldRequest extends FormRequest
{
    private const ALLOWED_FIELDS = ['description', 'notes'];

    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'field' => ['required', 'string', 'in:' . implode(',', self::ALLOWED_FIELDS)],
            'value' => ['nullable', 'string'],
        ];
    }

    public function messages(): array
    {
        return [
            'field.in' => __('ui.error_saving'),
        ];
    }
}
