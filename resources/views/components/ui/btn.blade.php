@props([
  'variant' => 'primary',  // primary|secondary|danger|ghost
  'size' => 'md',          // sm|md|lg
  'type' => 'button',
  'block' => false,
  'iconLeft' => null,
  'iconRight' => null,
])

@php
$base = 'inline-flex items-center justify-center rounded-md transition focus:outline-none focus:ring-2 focus:ring-offset-2 dark:focus:ring-offset-gray-800';
$sizes = [
  'sm' => 'text-xs px-2.5 py-1.5',
  'md' => 'text-sm px-3 py-2',
  'lg' => 'text-base px-4 py-2.5',
];
$variants = [
  'primary' => 'bg-indigo-600 text-white hover:bg-indigo-700 focus:ring-indigo-500',
  'secondary' => 'bg-gray-100 text-gray-900 hover:bg-gray-200 dark:bg-gray-700 dark:text-gray-100 dark:hover:bg-gray-600 focus:ring-gray-400',
  'danger' => 'bg-red-600 text-white hover:bg-red-700 focus:ring-red-500',
  'ghost' => 'bg-transparent text-gray-700 hover:bg-gray-100 dark:text-gray-300 dark:hover:bg-gray-700 focus:ring-gray-400',
];
$blockClass = $block ? 'w-full' : '';
@endphp

<button type="{{ $type }}" {{ $attributes->class("$base {$sizes[$size]} {$variants[$variant]} $blockClass") }}>
  @if($iconLeft)<span class="me-2">{{ $iconLeft }}</span>@endif
  <span>{{ $slot }}</span>
  @if($iconRight)<span class="ms-2">{{ $iconRight }}</span>@endif
</button>