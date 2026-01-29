@props(['method'])

@php
    $config = match($method) {
        'cash' => [
            'bg' => 'bg-green-100 text-green-800 dark:bg-green-900/30 dark:text-green-300',
            'icon' => '💵',
            'label' => __('payments.method_cash'),
        ],
        'bank' => [
            'bg' => 'bg-blue-100 text-blue-800 dark:bg-blue-900/30 dark:text-blue-300',
            'icon' => '🏦',
            'label' => __('payments.method_bank'),
        ],
        'stripe' => [
            'bg' => 'bg-purple-100 text-purple-800 dark:bg-purple-900/30 dark:text-purple-300',
            'icon' => '💳',
            'label' => __('payments.method_stripe'),
        ],
        'paypal' => [
            'bg' => 'bg-indigo-100 text-indigo-800 dark:bg-indigo-900/30 dark:text-indigo-300',
            'icon' => '💙',
            'label' => __('payments.method_paypal'),
        ],
        default => [
            'bg' => 'bg-gray-100 text-gray-800 dark:bg-gray-900/30 dark:text-gray-300',
            'icon' => '⏳',
            'label' => __('payments.method_not_set'),
        ],
    };
@endphp

<span {{ $attributes->merge(['class' => "inline-flex items-center gap-1 px-2.5 py-0.5 rounded-full text-xs font-medium {$config['bg']}"]) }}>
    <span>{{ $config['icon'] }}</span>
    <span>{{ $config['label'] }}</span>
</span>