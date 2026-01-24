<?php

namespace App\Http\Requests\Labels;

use App\Models\Label;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreLabelRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name' => ['required', 'string', 'max:50', 'unique:labels,name'],
            'color' => ['required', 'string', Rule::in(array_keys(Label::COLORS))],
        ];
    }
}