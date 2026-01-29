<?php

namespace App\Queries\Projects;

use App\Models\Project;

class ProjectProfitStatsQuery
{
    /**
     * Calculate profit statistics for a project
     */
    public function handle(Project $project): array
    {
        // Total payments received for the project
        // Filter: paid_at IS NOT NULL to count only received payments
        $totalPayments = $project->payments()
            ->whereNotNull('paid_at')
            ->where('currency', 'EUR')
            ->sum('amount');
        
        // Total costs paid
        // Note: costs.paid_at is NOT NULL, so all costs are always included
        $totalCosts = $project->costs()
            ->where('currency', 'EUR')
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