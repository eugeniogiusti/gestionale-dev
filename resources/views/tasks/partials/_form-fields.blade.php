<div class="space-y-4">
    
    {{-- Title --}}
    <div>
        <label class="block text-sm font-semibold text-gray-700 dark:text-gray-300 mb-2">
            {{ __('tasks.task_title') }} <span class="text-red-500">*</span>
        </label>
        <input type="text" 
               name="title" 
               x-model="formData.title"
               required
               placeholder="{{ __('tasks.placeholder.title') }}"
               class="w-full px-4 py-3 border border-gray-300 dark:border-gray-600 rounded-lg bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-100 focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500 transition">
        @error('title')
            <p class="mt-1 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
        @enderror
    </div>

    {{-- Description --}}
    <div>
        <label class="block text-sm font-semibold text-gray-700 dark:text-gray-300 mb-2">
            {{ __('tasks.description') }}
        </label>
        <textarea name="description" 
                  x-model="formData.description"
                  rows="4"
                  placeholder="{{ __('tasks.placeholder.description') }}"
                  class="w-full px-4 py-3 border border-gray-300 dark:border-gray-600 rounded-lg bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-100 focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500 transition"></textarea>
        @error('description')
            <p class="mt-1 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
        @enderror
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
        
        {{-- Type --}}
        <div>
            <label class="block text-sm font-semibold text-gray-700 dark:text-gray-300 mb-2">
                {{ __('tasks.type') }} <span class="text-red-500">*</span>
            </label>
            <select name="type" 
                    x-model="formData.type"
                    required
                    class="w-full px-4 py-3 border border-gray-300 dark:border-gray-600 rounded-lg bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-100 focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500 transition">
                @foreach(\App\Models\Task::TYPES as $type)
                    <option value="{{ $type }}">{{ __('tasks.type_' . $type) }}</option>
                @endforeach
            </select>
            @error('type')
                <p class="mt-1 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
            @enderror
        </div>

        {{-- Status --}}
        <div>
            <label class="block text-sm font-semibold text-gray-700 dark:text-gray-300 mb-2">
                {{ __('tasks.status') }} <span class="text-red-500">*</span>
            </label>
            <select name="status" 
                    x-model="formData.status"
                    required
                    class="w-full px-4 py-3 border border-gray-300 dark:border-gray-600 rounded-lg bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-100 focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500 transition">
                @foreach(\App\Models\Task::STATUSES as $status)
                    <option value="{{ $status }}">{{ __('tasks.status_' . $status) }}</option>
                @endforeach
            </select>
            @error('status')
                <p class="mt-1 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
            @enderror
        </div>

    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
        
        {{-- Priority --}}
        <div>
            <label class="block text-sm font-semibold text-gray-700 dark:text-gray-300 mb-2">
                {{ __('tasks.priority') }}
            </label>
            <select name="priority" 
                    x-model="formData.priority"
                    class="w-full px-4 py-3 border border-gray-300 dark:border-gray-600 rounded-lg bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-100 focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500 transition">
                <option value="">{{ __('ui.none') }}</option>
                @foreach(\App\Models\Task::PRIORITIES as $priority)
                    <option value="{{ $priority }}">{{ __('tasks.priority_' . $priority) }}</option>
                @endforeach
            </select>
            @error('priority')
                <p class="mt-1 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
            @enderror
        </div>

        {{-- Due Date --}}
        <div>
            <label class="block text-sm font-semibold text-gray-700 dark:text-gray-300 mb-2">
                {{ __('tasks.due_date') }}
            </label>
            <input type="date" 
                   name="due_date" 
                   x-model="formData.due_date"
                   class="w-full px-4 py-3 border border-gray-300 dark:border-gray-600 rounded-lg bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-100 focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500 transition">
            @error('due_date')
                <p class="mt-1 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
            @enderror
        </div>

    </div>

</div>