<?php

namespace App\Queries;

use App\Models\Project;

class ProjectProfitStatsQuery
{
    public function handle(Project $project): array
    {
        // Payments
        $totalPayments = $project->payments()->where('currency', 'EUR')->sum('amount');
        
        // Costs
        $totalCosts = $project->costs()->where('currency', 'EUR')->sum('amount');
        
        // Profit
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