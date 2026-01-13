@props([
  'title' => '',
  'icon' => '•',
])

<div {{ $attributes->merge([
  'class' => 'bg-white dark:bg-gray-800 rounded-lg p-6 border border-gray-200 dark:border-gray-700'
]) }}>
  <h4 class="text-lg font-bold text-gray-900 dark:text-white mb-4 flex items-center gap-2">
    <span>{{ $icon }}</span>
    <span>{{ $title }}</span>
  </h4>

  {{ $slot }}
</div>