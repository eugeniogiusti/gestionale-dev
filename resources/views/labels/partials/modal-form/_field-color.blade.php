{{-- Color Picker Field --}}
<div>
    <label class="block text-sm font-semibold text-gray-700 dark:text-gray-300 mb-2">
        {{ __('labels.color') }} <span class="text-red-500">*</span>
    </label>
    <div class="grid grid-cols-4 gap-2">
        @foreach(\App\Models\Label::COLORS as $colorKey => $colorHex)
            <label class="cursor-pointer">
                <input type="radio" 
                       name="color" 
                       value="{{ $colorKey }}"
                       x-model="formData.color"
                       required
                       class="sr-only">
                <div class="w-full h-12 rounded-lg border-2 transition hover:scale-105"
                     :class="formData.color === '{{ $colorKey }}' ? 'border-gray-900 dark:border-white ring-2 ring-offset-2 ring-emerald-500' : 'border-gray-300 dark:border-gray-600'"
                     style="background-color: {{ $colorHex }}"></div>
            </label>
        @endforeach
    </div>
    <p class="mt-2 text-xs text-gray-500 dark:text-gray-400">
        {{ __('labels.color_hint') }}
    </p>
</div>