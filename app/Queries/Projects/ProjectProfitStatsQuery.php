<?php

namespace App\Queries\Projects;

use App\Models\BusinessSettings;
use App\Models\Project;

/**
 * Profit statistics for a single project.
 *
 * Calculates: total_payments, total_costs, total_profit, profit_margin (%).
 * All amounts filtered by the default currency from BusinessSettings.
 * Used in the project show page profit card.
 */
class ProjectProfitStatsQuery
{
    public function handle(Project $project): array
    {
        $currency = BusinessSettings::current()->default_currency;

        $totalPayments = $project->payments()
            ->whereNotNull('paid_at')
            ->where('currency', $currency)
            ->sum('amount');

        $totalCosts = $project->costs()
            ->where('currency', $currency)
            ->sum('amount');
        
        // Calculate profit and margin
        $totalProfit = $totalPayments - $totalCosts;
        $profitMargin = $totalPayments > 0 ? ($totalProfit / $totalPayments) * 100 : 0;

        return [
            'total_payments' => $totalPayments,
            'total_costs' => $totalCosts,
            'total_profit' => $totalProfit,
            'profit_margin' => $profitMargin,
        ];
    }
}