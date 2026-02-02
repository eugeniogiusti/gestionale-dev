<?php

namespace App\Queries\Documents;

use App\Models\Document;
use Illuminate\Support\Facades\DB;

class DocumentStatsQuery
{
    public function handle(): array
    {
        return [
            'this_month' => Document::whereMonth('uploaded_at', now()->month)
                ->whereYear('uploaded_at', now()->year)
                ->count(),
            'by_label' => $this->getDocumentsByLabel(),
        ];
    }

    /**
     * Get documents count grouped by label
     */
    private function getDocumentsByLabel(): array
    {
        return DB::table('document_label')
            ->join('labels', 'document_label.label_id', '=', 'labels.id')
            ->select('labels.name', 'labels.color', DB::raw('count(*) as count'))
            ->groupBy('labels.id', 'labels.name', 'labels.color')
            ->orderByDesc('count')
            ->limit(5)
            ->get()
            ->toArray();
    }
}