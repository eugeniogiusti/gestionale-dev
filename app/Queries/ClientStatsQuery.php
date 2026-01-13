<?php

namespace App\Queries;

use App\Models\Client;
use Illuminate\Support\Facades\DB;

class ClientStatsQuery
{
    /**
     * Get all client statistics for index cards
     */
    public function handle(): array
    {
        // Total clients
        $total = Client::count();

        // Clients by status
        $byStatus = Client::select('status', DB::raw('count(*) as count'))
            ->groupBy('status')
            ->pluck('count', 'status')
            ->toArray();

        // New clients this month
        $newThisMonth = Client::whereYear('created_at', now()->year)
            ->whereMonth('created_at', now()->month)
            ->count();

        // Converted clients this month (lead → active)
        $convertedThisMonth = Client::where('status', 'active')
            ->whereYear('updated_at', now()->year)
            ->whereMonth('updated_at', now()->month)
            ->count();

        return [
            'total' => $total,
            'lead' => $byStatus['lead'] ?? 0,
            'active' => $byStatus['active'] ?? 0,
            'archived' => $byStatus['archived'] ?? 0,
            'new_this_month' => $newThisMonth,
            'converted_this_month' => $convertedThisMonth,
            'lead_percentage' => $total > 0 ? round(($byStatus['lead'] ?? 0) / $total * 100) : 0,
            'archived_percentage' => $total > 0 ? round(($byStatus['archived'] ?? 0) / $total * 100) : 0,
        ];
    }
}