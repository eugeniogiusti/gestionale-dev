{{-- Business Settings --}}
<a href="{{ route('settings.business.edit') }}"
   class="flex items-center px-3 py-2 rounded-md text-sm font-medium
          text-gray-700 dark:text-gray-300
          hover:bg-gray-100 dark:hover:bg-gray-700
          {{ request()->routeIs('settings.business.*') ? 'bg-gray-200 text-gray-900 dark:bg-gray-700 dark:text-white' : '' }}
          transition"
   :title="collapsed ? '{{ __('business_settings.sidebar_title') }}' : ''"
>
    <svg class="w-5 h-5" :class="collapsed ? '' : 'mr-3'" fill="none" stroke="currentColor" viewBox="0 0 24 24">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" />
    </svg>
    <span x-show="!collapsed">{{ __('business_settings.sidebar_title') }}</span>
</a>

{{-- Labels --}}
<a href="{{ route('labels.index') }}"
   class="flex items-center px-3 py-2 rounded-md text-sm font-medium
          text-gray-700 dark:text-gray-300
          hover:bg-gray-100 dark:hover:bg-gray-700
          {{ request()->routeIs('labels.*') ? 'bg-gray-200 text-gray-900 dark:bg-gray-700 dark:text-white' : '' }}
          transition"
   :title="collapsed ? '{{ __('labels.title') }}' : ''"
>
    <svg class="w-5 h-5" :class="collapsed ? '' : 'mr-3'" fill="none" stroke="currentColor" viewBox="0 0 24 24">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z" />
    </svg>
    <span x-show="!collapsed">{{ __('labels.title') }}</span>
</a>

{{-- Profile --}}
<a href="{{ route('profile.edit') }}"
   class="flex items-center px-3 py-2 rounded-md text-sm font-medium
          text-gray-700 dark:text-gray-300
          hover:bg-gray-100 dark:hover:bg-gray-700
          {{ request()->routeIs('profile.*') ? 'bg-gray-200 text-gray-900 dark:bg-gray-700 dark:text-white' : '' }}
          transition"
   :title="collapsed ? '{{ __('navbar.profile') }}' : ''"
>
    <svg class="w-5 h-5" :class="collapsed ? '' : 'mr-3'" fill="none" stroke="currentColor" viewBox="0 0 24 24">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
    </svg>
    <span x-show="!collapsed">{{ __('navbar.profile') }}</span>
</a>