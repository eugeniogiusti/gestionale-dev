<?php

namespace App\Http\Requests\Tasks;

use Illuminate\Foundation\Http\FormRequest;
use App\Models\Task;

class UpdateTaskRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'title' => ['required', 'string', 'max:255'],
            'description' => ['nullable', 'string', 'max:5000'],
            'type' => ['required', 'string', 'in:' . implode(',', Task::TYPES)],
            'status' => ['required', 'string', 'in:' . implode(',', Task::STATUSES)],
            'priority' => ['nullable', 'string', 'in:' . implode(',', Task::PRIORITIES)],
            'due_date' => ['nullable', 'date'],
            'order' => ['nullable', 'integer', 'min:0'],
        ];
    }
}