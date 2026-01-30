<div class="space-y-4">

    {{-- Title + Duration --}}
    <div class="grid grid-cols-3 gap-3">
        <div class="col-span-2">
            <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">
                {{ __('meetings.meeting_title') }} <span class="text-red-500">*</span>
            </label>
            <input type="text"
                   name="title"
                   x-model="formData.title"
                   required
                   placeholder="{{ __('meetings.placeholder.title') }}"
                   class="w-full px-3 py-2 text-sm border border-gray-300 dark:border-gray-600 rounded-lg bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-100 focus:ring-2 focus:ring-emerald-500 transition">
            @error('title')
                <p class="mt-0.5 text-xs text-red-600 dark:text-red-400">{{ $message }}</p>
            @enderror
        </div>
        <div>
            <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">
                {{ __('meetings.duration') }}
            </label>
            <select name="duration_minutes"
                    x-model="formData.duration_minutes"
                    class="w-full px-3 py-2 text-sm border border-gray-300 dark:border-gray-600 rounded-lg bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-100 focus:ring-2 focus:ring-emerald-500 transition">
                <option value="15">15 min</option>
                <option value="30">30 min</option>
                <option value="60" selected>60 min</option>
                <option value="90">90 min</option>
                <option value="120">120 min</option>
            </select>
            @error('duration_minutes')
                <p class="mt-0.5 text-xs text-red-600 dark:text-red-400">{{ $message }}</p>
            @enderror
        </div>
    </div>

    {{-- Scheduled At + Status (edit only) --}}
    <div class="grid gap-3" :class="isEdit ? 'grid-cols-2' : 'grid-cols-1'">
        <div>
            <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">
                {{ __('meetings.scheduled_at') }} <span class="text-red-500">*</span>
            </label>
            <input type="datetime-local"
                   name="scheduled_at"
                   x-model="formData.scheduled_at"
                   required
                   class="w-full px-3 py-2 text-sm border border-gray-300 dark:border-gray-600 rounded-lg bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-100 focus:ring-2 focus:ring-emerald-500 transition">
            @error('scheduled_at')
                <p class="mt-0.5 text-xs text-red-600 dark:text-red-400">{{ $message }}</p>
            @enderror
        </div>
        <div x-show="isEdit">
            <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">
                {{ __('meetings.status') }}
            </label>
            <select name="status"
                    x-model="formData.status"
                    class="w-full px-3 py-2 text-sm border border-gray-300 dark:border-gray-600 rounded-lg bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-100 focus:ring-2 focus:ring-emerald-500 transition">
                @foreach(\App\Models\Meeting::STATUSES as $status)
                    <option value="{{ $status }}">{{ __('meetings.status_' . $status) }}</option>
                @endforeach
            </select>
            @error('status')
                <p class="mt-0.5 text-xs text-red-600 dark:text-red-400">{{ $message }}</p>
            @enderror
        </div>
    </div>

    {{-- Location + Meeting URL --}}
    <div class="grid grid-cols-2 gap-3">
        <div>
            <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">
                {{ __('meetings.location') }}
            </label>
            <input type="text"
                   name="location"
                   x-model="formData.location"
                   placeholder="{{ __('meetings.placeholder.location') }}"
                   class="w-full px-3 py-2 text-sm border border-gray-300 dark:border-gray-600 rounded-lg bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-100 focus:ring-2 focus:ring-emerald-500 transition">
            @error('location')
                <p class="mt-0.5 text-xs text-red-600 dark:text-red-400">{{ $message }}</p>
            @enderror
        </div>
        <div>
            <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">
                {{ __('meetings.meeting_url') }}
            </label>
            <input type="url"
                   name="meeting_url"
                   x-model="formData.meeting_url"
                   placeholder="{{ __('meetings.placeholder.meeting_url') }}"
                   class="w-full px-3 py-2 text-sm border border-gray-300 dark:border-gray-600 rounded-lg bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-100 focus:ring-2 focus:ring-emerald-500 transition">
            @error('meeting_url')
                <p class="mt-0.5 text-xs text-red-600 dark:text-red-400">{{ $message }}</p>
            @enderror
        </div>
    </div>

    {{-- Description --}}
    <div>
        <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">
            {{ __('meetings.description') }}
        </label>
        <textarea name="description"
                  x-model="formData.description"
                  rows="2"
                  placeholder="{{ __('meetings.placeholder.description') }}"
                  class="w-full px-3 py-2 text-sm border border-gray-300 dark:border-gray-600 rounded-lg bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-100 focus:ring-2 focus:ring-emerald-500 transition"></textarea>
        @error('description')
            <p class="mt-0.5 text-xs text-red-600 dark:text-red-400">{{ $message }}</p>
        @enderror
    </div>

    {{-- Notes (only for edit) --}}
    <div x-show="isEdit">
        <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">
            {{ __('meetings.notes') }}
        </label>
        <textarea name="notes"
                  x-model="formData.notes"
                  rows="2"
                  placeholder="{{ __('meetings.placeholder.notes') }}"
                  class="w-full px-3 py-2 text-sm border border-gray-300 dark:border-gray-600 rounded-lg bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-100 focus:ring-2 focus:ring-emerald-500 transition"></textarea>
        @error('notes')
            <p class="mt-0.5 text-xs text-red-600 dark:text-red-400">{{ $message }}</p>
        @enderror
    </div>

</div>
