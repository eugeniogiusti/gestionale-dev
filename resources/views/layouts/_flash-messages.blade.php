{{-- Flash Messages (Success/Error) - resources/views/layouts/_flash-messages.blade.php --}}
    @if(session('success'))
        <x-ui.toast type="success" :message="session('success')" />
    @endif

    @if(session('error'))
        <x-ui.toast type="error" :message="session('error')" />
    @endif

    {{-- Validation Errors --}}
    @if($errors->any())
        @foreach($errors->all() as $error)
            <x-ui.toast type="error" :message="$error" />
        @endforeach
    @endif