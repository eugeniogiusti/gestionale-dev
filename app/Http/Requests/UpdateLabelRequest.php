<?php

namespace App\Http\Requests;

use App\Models\Label;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateLabelRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name' => ['required', 'string', 'max:50', Rule::unique('labels')->ignore($this->label)],
            'color' => ['required', 'string', Rule::in(array_keys(Label::COLORS))],
        ];
    }
}