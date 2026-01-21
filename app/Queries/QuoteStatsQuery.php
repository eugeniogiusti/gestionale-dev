<?php

namespace App\Queries;

use App\Models\Quote;

class QuoteStatsQuery
{
    public function handle(): array
    {
        return [
            'total' => Quote::count(),
            'draft' => Quote::byStatus('draft')->count(), 
            'sent' => Quote::byStatus('sent')->count(),    
            'accepted' => Quote::byStatus('accepted')->count(),  
            'rejected' => Quote::byStatus('rejected')->count(),
            'expired' => Quote::byStatus('expired')->count(),
            'recent' => Quote::with(['project.client'])
                ->latest('quote_date')
                ->limit(5)
                ->get(),
        ];
    }
}