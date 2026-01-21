@props(['quote'])

<span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium
    {{ $quote->status_color === 'gray' ? 'bg-gray-100 text-gray-800 dark:bg-gray-700 dark:text-gray-300' : '' }}
    {{ $quote->status_color === 'blue' ? 'bg-blue-100 text-blue-800 dark:bg-blue-900/30 dark:text-blue-400' : '' }}
    {{ $quote->status_color === 'green' ? 'bg-green-100 text-green-800 dark:bg-green-900/30 dark:text-green-400' : '' }}
    {{ $quote->status_color === 'red' ? 'bg-red-100 text-red-800 dark:bg-red-900/30 dark:text-red-400' : '' }}
    {{ $quote->status_color === 'orange' ? 'bg-orange-100 text-orange-800 dark:bg-orange-900/30 dark:text-orange-400' : '' }}">
    {{ $quote->status_label }}
</span>