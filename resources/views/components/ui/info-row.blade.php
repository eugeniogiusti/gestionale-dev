@props([
  'icon' => '•',
  'label' => '',
])

<div class="flex items-start gap-3">
  <span class="text-xl mt-0.5">{{ $icon }}</span>

  <div class="flex-1 min-w-0">
    @if($label)
      <p class="text-xs text-gray-500 dark:text-gray-400 uppercase tracking-wide">
        {{ $label }}
      </p>
    @endif

    <div class="text-sm text-gray-900 dark:text-white">
      {{ $slot }}
    </div>
  </div>
</div>