<?php

namespace App\Http\Requests\Timesheets;

use Illuminate\Foundation\Http\FormRequest;

class StoreTimesheetRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'year'              => ['required', 'integer', 'min:2000', 'max:2100'],
            'month'             => ['required', 'integer', 'min:1', 'max:12'],
            'daily_hours'       => ['nullable', 'array'],
            'daily_hours.*'     => ['nullable', 'numeric', 'min:0', 'max:24'],
            'notes'             => ['nullable', 'string'],
        ];
    }

    protected function prepareForValidation(): void
    {
        // Remove empty/null values from daily_hours array
        if ($this->has('daily_hours')) {
            $filtered = array_filter(
                $this->daily_hours ?? [],
                fn($v) => $v !== null && $v !== '' && (float) $v > 0
            );
            $this->merge(['daily_hours' => $filtered]);
        }
    }
}
