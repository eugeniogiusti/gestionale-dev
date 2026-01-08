@props([
  'type' => 'text',
  'id' => null,
  'name' => null,
  'value' => null,
  'placeholder' => null,
])

<input
  {{ $attributes->merge([
    'class' => 'block w-full rounded-md border-gray-300 shadow-sm
                focus:border-indigo-500 focus:ring-indigo-500
                dark:bg-gray-900 dark:border-gray-700 dark:text-gray-100',
  ]) }}
  @if($id) id="{{ $id }}" @endif
  @if($name) name="{{ $name }}" @endif
  @if(!is_null($value)) value="{{ old($name, $value) }}" @endif
  @if($placeholder) placeholder="{{ $placeholder }}" @endif
  type="{{ $type }}"
/>