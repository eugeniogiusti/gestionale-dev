{{-- Filter Actions --}}
<div class="flex gap-2">
    <x-button type="submit" variant="primary" class="flex-1">
        {{ __('projects.filter') }}
    </x-button>
    <a href="{{ route('projects.index') }}">
        <x-button type="button" variant="secondary">
            {{ __('projects.reset') }}
        </x-button>
    </a>
</div>