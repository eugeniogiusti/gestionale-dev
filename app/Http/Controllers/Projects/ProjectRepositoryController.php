<?php

namespace App\Http\Controllers\Projects;

use App\Http\Controllers\Controller;
use App\Models\Project;
use App\Services\GitHub\GitHubService;
use Illuminate\Http\JsonResponse;

class ProjectRepositoryController extends Controller
{
    public function __invoke(Project $project, GitHubService $github): JsonResponse
    {
        $repoUrl = $project->repo_url;

        if (!$repoUrl || !str_contains($repoUrl, 'github.com')) {
            return response()->json(['error' => 'No GitHub repository configured.'], 404);
        }

        return response()->json([
            'info'     => $github->repoInfo($repoUrl),
            'commits'  => $github->recentCommits($repoUrl, 10),
            'activity' => $github->commitActivity($repoUrl),
        ]);
    }
}
