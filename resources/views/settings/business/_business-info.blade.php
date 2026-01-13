<div class="space-y-6">
    
    {{-- Business Name --}}
    <x-form-input
        name="business_name"
        :label="__('business_settings.business_name')"
        :placeholder="__('business_settings.placeholder.business_name')"
        :value="$settings->business_name"
    />

    {{-- Business Description --}}
    <x-form-textarea
        name="business_description"
        :label="__('business_settings.business_description')"
        :placeholder="__('business_settings.placeholder.business_description')"
        :value="$settings->business_description"
        rows="4"
    />

    {{-- Website --}}
    <x-form-input
        type="url"
        name="website"
        :label="__('business_settings.website')"
        :placeholder="__('business_settings.placeholder.website')"
        :value="$settings->website"
    />

    {{-- Logo Upload --}}
    <div>
        <label class="block text-sm font-semibold text-gray-700 dark:text-gray-300 mb-2">
            {{ __('business_settings.logo') }}
        </label>

        {{-- Current Logo Preview --}}
        @if($settings->logo_path)
            <div class="mb-4 flex items-center gap-4">
                <img src="{{ $settings->logo_url }}" 
                     alt="Logo" 
                     class="w-32 h-32 object-contain border border-gray-300 dark:border-gray-600 rounded-lg bg-white dark:bg-gray-700 p-2">
                
                <button type="button"
                        onclick="if(confirm('{{ __('business_settings.confirm_delete_logo') }}')) { document.getElementById('delete-logo-form').submit(); }"
                        class="text-sm text-red-600 hover:text-red-800 dark:text-red-400 dark:hover:text-red-300">
                    🗑️ {{ __('business_settings.delete_logo') }}
                </button>
            </div>
        @endif

        {{-- Upload Input --}}
        <input type="file" 
               name="logo" 
               accept="image/jpeg,image/jpg,image/png,image/svg+xml"
               class="w-full px-4 py-3 border border-gray-300 dark:border-gray-600 rounded-lg 
                      bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-100
                      file:mr-4 file:py-2 file:px-4
                      file:rounded-lg file:border-0
                      file:text-sm file:font-semibold
                      file:bg-emerald-50 file:text-emerald-700
                      hover:file:bg-emerald-100
                      dark:file:bg-emerald-900 dark:file:text-emerald-300
                      dark:hover:file:bg-emerald-800
                      focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500
                      transition duration-150">
        
        <p class="mt-2 text-sm text-gray-500 dark:text-gray-400">
            {{ __('business_settings.logo_hint') }}
        </p>

        @error('logo')
            <p class="mt-2 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
        @enderror
    </div>

</div>