<?php

namespace App\Queries;

use App\Models\Client;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

class ClientIndexQuery
{
    /**
     * Handle the query
     */
    public function handle(): LengthAwarePaginator
    {
        return Client::query()
            ->when(request('status'), function ($query) {
                $query->where('status', request('status'));
            })
            ->when(request('search'), function ($query) {
                $search = request('search');
                $query->where(function($q) use ($search) {
                    $q->where('name', 'like', "%{$search}%")
                    ->orWhere('email', 'like', "%{$search}%")
                    ->orWhere('vat_number', 'like', "%{$search}%");
                });
            })
            ->orderBy(
                request('sort_by', 'created_at'),
                request('sort_direction', 'desc')
            )
            ->paginate(15)
            ->appends(request()->query());
    }
}