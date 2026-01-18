{{-- Dashboard --}}
<a href="{{ route('dashboard') }}"
   class="flex items-center px-3 py-2 rounded-md text-sm font-medium
          text-gray-700 dark:text-gray-300
          hover:bg-gray-100 dark:hover:bg-gray-700
          {{ request()->routeIs('dashboard') ? 'bg-gray-200 text-gray-900 dark:bg-gray-700 dark:text-white' : '' }}
          transition"
   :title="collapsed ? '{{ __('navbar.dashboard') }}' : ''"
>
    <svg class="w-5 h-5" :class="collapsed ? '' : 'mr-3'" fill="none" stroke="currentColor" viewBox="0 0 24 24">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
    </svg>
    <span x-show="!collapsed">{{ __('navbar.dashboard') }}</span>
</a>

{{-- Clients --}}
<a href="{{ route('clients.index') }}"
   class="flex items-center px-3 py-2 rounded-md text-sm font-medium
          text-gray-700 dark:text-gray-300
          hover:bg-gray-100 dark:hover:bg-gray-700
          {{ request()->routeIs('clients.*') ? 'bg-gray-200 text-gray-900 dark:bg-gray-700 dark:text-white' : '' }}
          transition"
   :title="collapsed ? '{{ __('clients.title') }}' : ''"
>
    <svg class="w-5 h-5" :class="collapsed ? '' : 'mr-3'" fill="none" stroke="currentColor" viewBox="0 0 24 24">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
    </svg>
    <span x-show="!collapsed">{{ __('clients.title') }}</span>
</a>

{{-- Projects --}}
<a href="{{ route('projects.index') }}"
   class="flex items-center px-3 py-2 rounded-md text-sm font-medium
          text-gray-700 dark:text-gray-300
          hover:bg-gray-100 dark:hover:bg-gray-700
          {{ request()->routeIs('projects.*') ? 'bg-gray-200 text-gray-900 dark:bg-gray-700 dark:text-white' : '' }}
          transition"
   :title="collapsed ? '{{ __('projects.title') }}' : ''"
>
    <svg class="w-5 h-5" :class="collapsed ? '' : 'mr-3'" fill="none" stroke="currentColor" viewBox="0 0 24 24">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
    </svg>
    <span x-show="!collapsed">{{ __('projects.title') }}</span>
</a>

{{-- Tasks --}}
<a href="{{ route('tasks.index') }}"
   class="flex items-center px-3 py-2 rounded-md text-sm font-medium
          text-gray-700 dark:text-gray-300
          hover:bg-gray-100 dark:hover:bg-gray-700
          {{ request()->routeIs('tasks.*') ? 'bg-gray-200 text-gray-900 dark:bg-gray-700 dark:text-white' : '' }}
          transition"
   :title="collapsed ? '{{ __('tasks.title') }}' : ''"
>
    <svg class="w-5 h-5" :class="collapsed ? '' : 'mr-3'" fill="none" stroke="currentColor" viewBox="0 0 24 24">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-6 9l2 2 4-4" />
    </svg>
    <span x-show="!collapsed">{{ __('tasks.title') }}</span>
</a>

{{-- Meetings --}}
<a href="{{ route('meetings.index') }}"
   class="flex items-center px-3 py-2 rounded-md text-sm font-medium
          text-gray-700 dark:text-gray-300
          hover:bg-gray-100 dark:hover:bg-gray-700
          {{ request()->routeIs('meetings.*') ? 'bg-gray-200 text-gray-900 dark:bg-gray-700 dark:text-white' : '' }}
          transition"
   :title="collapsed ? '{{ __('meetings.title') }}' : ''"
>
    <svg class="w-5 h-5" :class="collapsed ? '' : 'mr-3'" fill="none" stroke="currentColor" viewBox="0 0 24 24">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
    </svg>
    <span x-show="!collapsed">{{ __('meetings.title') }}</span>
</a>

{{-- Payments --}}
<a href="{{ route('payments.index') }}"
   class="flex items-center px-3 py-2 rounded-md text-sm font-medium
          text-gray-700 dark:text-gray-300
          hover:bg-gray-100 dark:hover:bg-gray-700
          {{ request()->routeIs('payments.*') ? 'bg-gray-200 text-gray-900 dark:bg-gray-700 dark:text-white' : '' }}
          transition"
   :title="collapsed ? '{{ __('payments.title') }}' : ''"
>
    <svg class="w-5 h-5" :class="collapsed ? '' : 'mr-3'" fill="none" stroke="currentColor" viewBox="0 0 24 24">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
    </svg>
    <span x-show="!collapsed">{{ __('payments.title') }}</span>
</a>

{{-- Costs --}}
<a href="{{ route('costs.index') }}"
   class="flex items-center px-3 py-2 rounded-md text-sm font-medium
          text-gray-700 dark:text-gray-300
          hover:bg-gray-100 dark:hover:bg-gray-700
          {{ request()->routeIs('costs.*') ? 'bg-gray-200 text-gray-900 dark:bg-gray-700 dark:text-white' : '' }}
          transition"
   :title="collapsed ? '{{ __('costs.title') }}' : ''"
>
    <svg class="w-5 h-5" :class="collapsed ? '' : 'mr-3'" fill="none" stroke="currentColor" viewBox="0 0 24 24">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 9V7a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2m2 4h10a2 2 0 002-2v-6a2 2 0 00-2-2H9a2 2 0 00-2 2v6a2 2 0 002 2zm7-5a2 2 0 11-4 0 2 2 0 014 0z" />
    </svg>
    <span x-show="!collapsed">{{ __('costs.title') }}</span>
</a>