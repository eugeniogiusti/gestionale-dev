<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('twofactor.trusted_devices.title') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    
                    <p class="text-sm text-gray-600 dark:text-gray-400 mb-6">
                        {{ __('twofactor.trusted_devices.subtitle') }}
                    </p>

                    {{-- Flash Messages --}}
                    @if (session('status') === 'device-revoked')
                        <div class="mb-4 p-4 bg-green-50 dark:bg-green-900/30 text-green-800 dark:text-green-200 rounded-lg">
                            {{ __('twofactor.device_revoked') }}
                        </div>
                    @elseif (session('status') === 'all-devices-revoked')
                        <div class="mb-4 p-4 bg-green-50 dark:bg-green-900/30 text-green-800 dark:text-green-200 rounded-lg">
                            {{ __('twofactor.all_devices_revoked') }}
                        </div>
                    @endif

                    {{-- List Devices --}}
                    @if ($devices->count() > 0)
                        <div class="space-y-4">
                            @foreach ($devices as $device)
                                <div class="flex items-center justify-between p-4 border border-gray-200 dark:border-gray-700 rounded-lg">
                                    <div class="flex-1">
                                        <div class="flex items-center gap-3">
                                            <h3 class="font-medium text-gray-900 dark:text-gray-100">
                                                {{ $device->device_name }}
                                            </h3>
                                            
                                            @if ($device->device_hash === $currentDeviceHash)
                                                <span class="px-2 py-1 text-xs font-semibold bg-blue-100 dark:bg-blue-900 text-blue-800 dark:text-blue-200 rounded">
                                                    {{ __('twofactor.trusted_devices.current_device') }}
                                                </span>
                                            @endif
                                        </div>
                                        
                                        <div class="text-sm text-gray-600 dark:text-gray-400 mt-1 space-y-1">
                                            <p>{{ __('twofactor.trusted_devices.added_on', ['date' => $device->created_at->format('d/m/Y H:i')]) }}</p>
                                            @if ($device->ip_address)
                                                <p class="font-mono text-xs">IP: {{ $device->ip_address }}</p>
                                            @endif
                                        </div>
                                    </div>

                                    <form method="POST" action="{{ route('profile.trusted-devices.revoke', $device->id) }}">
                                        @csrf
                                        @method('DELETE')
                                        
                                        <x-danger-button type="submit">
                                            {{ __('twofactor.trusted_devices.revoke_button') }}
                                        </x-danger-button>
                                    </form>
                                </div>
                            @endforeach
                        </div>

                        {{-- Revoke all devices --}}
                        <div class="mt-6 pt-6 border-t border-gray-200 dark:border-gray-700">
                            <form method="POST" action="{{ route('profile.trusted-devices.revoke-all') }}" 
                                  onsubmit="return confirm('{{ __('twofactor.trusted_devices.revoke_all_confirm') }}')">
                                @csrf
                                @method('DELETE')
                                
                                <x-danger-button type="submit">
                                    {{ __('twofactor.trusted_devices.revoke_all_button') }}
                                </x-danger-button>
                            </form>
                        </div>
                    @else
                        <p class="text-gray-600 dark:text-gray-400 py-8 text-center">
                            {{ __('twofactor.trusted_devices.no_devices') }}
                        </p>
                    @endif

                    {{-- Pagination --}}
                    @if ($devices->hasPages())
                        <div class="mt-6">
                            {{ $devices->links() }}
                        </div>
                    @endif
                    

                    {{-- Back to profile --}}
                    <div class="mt-6">
                        <a href="{{ route('profile.edit') }}">
                            <x-secondary-button type="button">
                                ← {{ __('twofactor.trusted_devices.back_to_profile') }}
                            </x-secondary-button>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>