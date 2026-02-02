{{-- Welcome Card --}}
<div class="bg-white dark:bg-gray-800 rounded-xl shadow-sm border border-gray-200 dark:border-gray-700 p-6 h-full flex flex-col transition-transform duration-200 hover:scale-[1.02]">
    {{-- Logo & Title --}}
    <div class="flex items-center gap-4 mb-4">
        <img src="{{ asset('images/logo.svg') }}" alt="IndieDesk" class="w-25 h-25 object-contain">
        <div>
            <h3 class="font-bold text-xl text-gray-900 dark:text-white">
                {{ __('dashboard.welcome_title') }}
            </h3>
            <p class="text-sm text-indigo-600 dark:text-indigo-400 font-medium">
                {{ __('dashboard.welcome_subtitle') }}
            </p>
        </div>
    </div>

    {{-- Description --}}
    <p class="text-gray-600 dark:text-gray-300 text-sm mb-6">
        {{ __('dashboard.welcome_description') }}
    </p>

    {{-- Features List --}}
    <div class="space-y-3 flex-1">
        <div class="flex items-center gap-3 text-sm">
            <div class="w-8 h-8 rounded-lg bg-blue-100 dark:bg-blue-900/30 flex items-center justify-center">
                <svg class="w-4 h-4 text-blue-600 dark:text-blue-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
                </svg>
            </div>
            <span class="text-gray-700 dark:text-gray-300">{{ __('dashboard.welcome_feature_clients') }}</span>
        </div>

        <div class="flex items-center gap-3 text-sm">
            <div class="w-8 h-8 rounded-lg bg-emerald-100 dark:bg-emerald-900/30 flex items-center justify-center">
                <svg class="w-4 h-4 text-emerald-600 dark:text-emerald-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01" />
                </svg>
            </div>
            <span class="text-gray-700 dark:text-gray-300">{{ __('dashboard.welcome_feature_projects') }}</span>
        </div>

        <div class="flex items-center gap-3 text-sm">
            <div class="w-8 h-8 rounded-lg bg-amber-100 dark:bg-amber-900/30 flex items-center justify-center">
                <svg class="w-4 h-4 text-amber-600 dark:text-amber-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg>
            </div>
            <span class="text-gray-700 dark:text-gray-300">{{ __('dashboard.welcome_feature_payments') }}</span>
        </div>

        <div class="flex items-center gap-3 text-sm">
            <div class="w-8 h-8 rounded-lg bg-purple-100 dark:bg-purple-900/30 flex items-center justify-center">
                <svg class="w-4 h-4 text-purple-600 dark:text-purple-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                </svg>
            </div>
            <span class="text-gray-700 dark:text-gray-300">{{ __('dashboard.welcome_feature_docs') }}</span>
        </div>
    </div>
</div>
