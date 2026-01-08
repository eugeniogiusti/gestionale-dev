@props(['for' => null])

<label {{ $attributes->merge(['class' => 'block text-sm font-medium text-gray-700 dark:text-gray-300']) }}
  @if($for) for="{{ $for }}" @endif
>
  {{ $slot }}
</label>