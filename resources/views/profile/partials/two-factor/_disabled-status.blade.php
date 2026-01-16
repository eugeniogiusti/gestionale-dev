<p class="mt-4 text-sm text-gray-700 dark:text-gray-300">
    {{ __('twofactor.disabled') }}
</p>

<form method="post" action="{{ route('two-factor.enable') }}" class="mt-4">
    @csrf
    <x-primary-button>
        {{ __('twofactor.enable_button') }}
    </x-primary-button>
</form>