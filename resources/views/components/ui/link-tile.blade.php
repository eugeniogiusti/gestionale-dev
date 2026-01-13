@props([
  'href' => '#',
  'icon' => '🔗',
  'label' => '',
  'value' => '',
])

<a href="{{ $href }}" target="_blank"
   class="flex items-center gap-3 p-4 bg-gradient-to-br from-blue-50 to-blue-100 dark:from-blue-900/20 dark:to-blue-800/20
          rounded-lg border border-blue-200 dark:border-blue-800 hover:shadow-md transition">
  <span class="text-2xl">{{ $icon }}</span>

  <div class="flex-1 min-w-0">
    <p class="text-xs text-blue-700 dark:text-blue-300 uppercase tracking-wide">{{ $label }}</p>
    <p class="text-sm font-medium text-gray-900 dark:text-white truncate">{{ $value }}</p>
  </div>

  <span class="text-gray-400">↗️</span>
</a>