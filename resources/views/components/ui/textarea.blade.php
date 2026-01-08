@props([
  'id' => null,
  'name' => null,
  'rows' => 4,
  'placeholder' => null,
])

<textarea
  {{ $attributes->merge([
    'class' => 'block w-full rounded-md border-gray-300 shadow-sm
                focus:border-indigo-500 focus:ring-indigo-500
                dark:bg-gray-900 dark:border-gray-700 dark:text-gray-100',
  ]) }}
  @if($id) id="{{ $id }}" @endif
  @if($name) name="{{ $name }}" @endif
  rows="{{ $rows }}"
  @if($placeholder) placeholder="{{ $placeholder }}" @endif
>{{ old($name, $slot) }}</textarea>