<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Project;
use Illuminate\Http\Request;

class ProjectSearchController extends Controller
{
    /**
     * Search projects by name, client name, or client VAT
     */
    public function __invoke(Request $request)
    {
        $query = $request->input('q');
        
        if (empty($query) || strlen($query) < 2) {
            return response()->json([
                'projects' => []
            ]);
        }

        // Search Projects (by name, client name, or client VAT)
        $projects = Project::with('client:id,name,vat_number')
            ->select('id', 'name', 'client_id')
            ->where(function($q) use ($query) {
                $q->where('name', 'like', "%{$query}%")
                  ->orWhereHas('client', function($clientQuery) use ($query) {
                      $clientQuery->where('name', 'like', "%{$query}%")
                                  ->orWhere('vat_number', 'like', "%{$query}%");
                  });
            })
            ->limit(10)
            ->get();

        return response()->json([
            'projects' => $projects
        ]);
    }
}