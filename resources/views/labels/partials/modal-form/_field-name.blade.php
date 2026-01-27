{{-- Name Field --}}
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