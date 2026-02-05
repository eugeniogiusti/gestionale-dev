<?php

namespace App\Http\Requests\Settings;

use Illuminate\Foundation\Http\FormRequest;

class UpdateAiSettingsRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'ai_enabled' => ['nullable', 'boolean'],
            'ai_api_key' => ['nullable', 'string', 'max:2000'],
        ];
    }
}
