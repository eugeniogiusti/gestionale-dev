{{-- Filter Actions --}}
<div class="flex gap-2">
    <button type="submit" class="px-4 py-2 bg-amber-600 hover:bg-amber-700 text-white font-semibold rounded-lg transition flex-1">
        {{ __('ui.filter') }}
    </button>
    <a href="{{ route('taxes.index') }}" class="px-4 py-2 border border-gray-300 dark:border-gray-600 rounded-lg hover:bg-gray-100 dark:hover:bg-gray-700 transition inline-flex items-center">
        {{ __('ui.reset') }}
    </a>
</div>
