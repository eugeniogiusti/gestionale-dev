<?php

namespace App\Queries;

use App\Models\Payment;

class PaymentIndexQuery
{
    public function handle()
    {
        return Payment::query()
            ->with(['project.client'])
            ->when(request('project_id'), fn($q, $projectId) => $q->forProject($projectId))
            ->when(request('method'), fn($q, $method) => $q->method($method))
            ->when(request('currency'), fn($q, $currency) => $q->currency($currency))
            ->when(request('date_from'), fn($q, $date) => $q->where('paid_at', '>=', $date))
            ->when(request('date_to'), fn($q, $date) => $q->where('paid_at', '<=', $date))
            ->when(request('search'), function($q, $search) {
                $q->where(function($query) use ($search) {
                    $query->where('reference', 'like', "%{$search}%")
                          ->orWhere('notes', 'like', "%{$search}%");
                });
            })
            ->orderBy('paid_at', 'desc')
            ->paginate(15);
    }
}