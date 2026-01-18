<div class="space-y-6">
    
    {{-- Main Stats --}}
    <div class="grid grid-cols-1 md:grid-cols-4 gap-6">
        
        {{-- Total Profit --}}
        <x-profit.stat-card
            :title="__('profit.total_profit')"
            :value="'€ ' . number_format($profitData['total_profit'], 2, ',', '.')"
            icon="💰"
            gradient="emerald"
            :valueColor="$profitData['total_profit'] >= 0 ? 'text-emerald-600 dark:text-emerald-400' : 'text-red-600 dark:text-red-400'"
            :subtitle="__('profit.margin') . ': ' . number_format($profitData['profit_margin'], 1) . '%'"
        />

        {{-- Total Payments --}}
        <x-profit.stat-card
            :title="__('profit.total_payments')"
            :value="'€ ' . number_format($profitData['total_payments'], 2, ',', '.')"
            icon="📥"
            gradient="blue"
            :subtitle="$project->payments->count() . ' ' . __('profit.payments_count')"
        />

        {{-- Total Costs --}}
        <x-profit.stat-card
            :title="__('profit.total_costs')"
            :value="'€ ' . number_format($profitData['total_costs'], 2, ',', '.')"
            icon="📤"
            gradient="red"
            :subtitle="$project->costs->count() . ' ' . __('profit.costs_count')"
        />

        {{-- ROI --}}
        <x-profit.stat-card
            :title="__('profit.roi')"
            :value="$profitData['total_costs'] > 0 
                ? number_format(($profitData['total_profit'] / $profitData['total_costs']) * 100, 0) . '%' 
                : '∞'"
            icon="📊"
            gradient="purple"
            :subtitle="__('profit.return_on_investment')"
        />

    </div>

    {{-- Quick Actions --}}
    <div class="bg-white dark:bg-gray-800 rounded-lg shadow-sm p-6">
        <h3 class="text-lg font-semibold text-gray-900 dark:text-white mb-4">
            {{ __('profit.quick_actions') }}
        </h3>
        <div class="flex gap-4">
            <button 
                @click="activeTab = 'payments'"
                class="px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition">
                💰 {{ __('profit.view_payments') }}
            </button>
            <button 
                @click="activeTab = 'costs'"
                class="px-4 py-2 bg-red-600 text-white rounded-lg hover:bg-red-700 transition">
                💸 {{ __('profit.view_costs') }}
            </button>
        </div>
    </div>

</div>
