<x-app-layout>
    <div class="space-y-6">
        {{-- Header --}}
        @include('settings.business._header')
        
        {{-- Main Form --}}
        <form method="POST" action="{{ route('settings.business.update') }}" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            
            @include('settings.business._tabs-container')
        </form>

        {{-- Hidden form for delete logo --}}
        <form id="delete-logo-form" 
              method="POST" 
              action="{{ route('settings.business.delete-logo') }}" 
              class="hidden">
            @csrf
            @method('DELETE')
        </form>
    </div>
</x-app-layout>