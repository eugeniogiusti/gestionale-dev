<div class="flex justify-end gap-3 pt-6 border-t border-gray-200 dark:border-gray-700">
    <a href="{{ route('clients.index') }}">
        <x-button type="button" variant="secondary">
            {{ __('clients.cancel') }}
        </x-button>
    </a>
    <x-button type="submit" variant="primary">
        {{ __('clients.save') }}
    </x-button>
</div>