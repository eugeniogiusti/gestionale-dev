<div x-data="labelModal(@js($labels))"
     @open-label-modal.window="openCreate()"
     @edit-label.window="openEdit($event.detail)"
     @keydown.escape.window="close()"
     x-cloak>
    
    {{-- Backdrop --}}
    <div x-show="open" 
         x-transition
         class="fixed inset-0 bg-gray-500 bg-opacity-75 z-40" 
         @click="close()"></div>

    {{-- Modal --}}
    <div x-show="open" 
         x-transition
         class="fixed inset-0 z-50 overflow-y-auto p-4" 
         @click.away="close()">
        
        <div class="mx-auto max-w-md mt-20">
            <div class="bg-white dark:bg-gray-800 rounded-lg shadow-xl" @click.stop>
                
                {{-- Header --}}
                <div class="px-6 py-4 border-b border-gray-200 dark:border-gray-700">
                    <div class="flex items-center justify-between">
                        <h3 class="text-lg font-semibold text-gray-900 dark:text-white">
                            <span x-show="!isEdit">{{ __('labels.create_label') }}</span>
                            <span x-show="isEdit">{{ __('labels.edit_label') }}</span>
                        </h3>
                        <button @click="close()" 
                                class="text-gray-400 hover:text-gray-500 dark:hover:text-gray-300">
                            <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                            </svg>
                        </button>
                    </div>
                </div>

                {{-- Form --}}
                <form method="POST" 
                      :action="isEdit 
                          ? '{{ route('labels.update', '__ID__') }}'.replace('__ID__', labelId) 
                          : '{{ route('labels.store') }}'">
                    @csrf
                    <input type="hidden" name="_method" x-bind:value="isEdit ? 'PUT' : 'POST'">

                    <div class="px-6 py-4 space-y-4">
                        
                        {{-- Name --}}
                        <div>
                            <label class="block text-sm font-semibold text-gray-700 dark:text-gray-300 mb-2">
                                {{ __('labels.name') }} <span class="text-red-500">*</span>
                            </label>
                            <input type="text" 
                                   name="name" 
                                   x-model="formData.name"
                                   required
                                   placeholder="{{ __('labels.placeholder.name') }}"
                                   class="w-full px-4 py-3 border border-gray-300 dark:border-gray-600 rounded-lg bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-100 focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500 transition">
                            @error('name')
                                <p class="mt-1 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                            @enderror
                        </div>

                        {{-- Color Picker --}}
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

                    </div>

                    {{-- Footer --}}
                    <div class="px-6 py-4 bg-gray-50 dark:bg-gray-900/50 border-t border-gray-200 dark:border-gray-700 flex justify-end gap-3">
                        <button type="button" 
                                @click="close()"
                                class="px-4 py-2 border border-gray-300 dark:border-gray-600 rounded-lg text-gray-700 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-700 transition">
                            {{ __('ui.cancel') }}
                        </button>
                        <button type="submit"
                                class="px-4 py-2 bg-emerald-600 text-white rounded-lg hover:bg-emerald-700 transition">
                            <span x-show="!isEdit">{{ __('ui.create') }}</span>
                            <span x-show="isEdit">{{ __('ui.save') }}</span>
                        </button>
                    </div>
                </form>

            </div>
        </div>
    </div>

</div>