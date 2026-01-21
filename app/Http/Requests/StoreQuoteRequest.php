<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreQuoteRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'title' => ['required', 'string', 'max:255'],
            'items' => ['required', 'array', 'min:1'],
            'items.*.description' => ['required', 'string', 'max:500'],
            'items.*.price' => ['required', 'numeric', 'min:0'],
            'notes' => ['nullable', 'string', 'max:1000'],
            'quote_date' => ['nullable', 'date'],
        ];
    }

    public function messages(): array
    {
        return [
            'items.required' => __('quotes.items_required'),
            'items.min' => __('quotes.items_min'),
            'items.*.description.required' => __('quotes.item_description_required'),
            'items.*.price.required' => __('quotes.item_price_required'),
            'items.*.price.min' => __('quotes.item_price_min'),
        ];
    }
}