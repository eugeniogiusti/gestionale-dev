<?php

namespace App\Services\GitHub;

use App\Models\BusinessSettings;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Http;

class GitHubService
{
    private const BASE_URL = 'https://api.github.com';
    private const CACHE_TTL = 600; // 10 minutes

    private ?string $pat;

    public function __construct()
    {
        $this->pat = BusinessSettings::current()->github_pat;
    }

    /**
     * Parse "owner/repo" from a full GitHub URL or a "owner/repo" string.
     */
    public function parseOwnerRepo(string $repoUrl): ?string
    {
        if (preg_match('/github\.com\/([^\/]+\/[^\/\s]+?)(?:\.git)?(?:\/.*)?$/', $repoUrl, $m)) {
            return $m[1];
        }

        // Already in "owner/repo" format
        if (preg_match('/^[^\/]+\/[^\/]+$/', $repoUrl)) {
            return $repoUrl;
        }

        return null;
    }

    /**
     * Get basic repo info (stars, default branch, open issues).
     */
    public function repoInfo(string $repoUrl): array
    {
        $ownerRepo = $this->parseOwnerRepo($repoUrl);
        if (!$ownerRepo) {
            return [];
        }

        return Cache::remember("github.{$ownerRepo}.info", self::CACHE_TTL, function () use ($ownerRepo) {
            $response = $this->request("repos/{$ownerRepo}");
            if (!$response) {
                return [];
            }

            return [
                'full_name'      => $response['full_name'] ?? null,
                'default_branch' => $response['default_branch'] ?? 'main',
                'stars'          => $response['stargazers_count'] ?? 0,
                'forks'          => $response['forks_count'] ?? 0,
                'open_issues'    => $response['open_issues_count'] ?? 0,
                'html_url'       => $response['html_url'] ?? null,
                'visibility'     => $response['visibility'] ?? 'public',
            ];
        });
    }

    /**
     * Get recent commits (default: 10).
     */
    public function recentCommits(string $repoUrl, int $limit = 10): array
    {
        $ownerRepo = $this->parseOwnerRepo($repoUrl);
        if (!$ownerRepo) {
            return [];
        }

        return Cache::remember("github.{$ownerRepo}.commits.{$limit}", self::CACHE_TTL, function () use ($ownerRepo, $limit) {
            $response = $this->request("repos/{$ownerRepo}/commits", ['per_page' => $limit]);
            if (!$response || !is_array($response)) {
                return [];
            }

            return array_map(fn ($c) => [
                'sha'     => substr($c['sha'] ?? '', 0, 7),
                'message' => strtok($c['commit']['message'] ?? '', "\n"),
                'author'  => $c['commit']['author']['name'] ?? 'Unknown',
                'date'    => $c['commit']['author']['date'] ?? null,
                'url'     => $c['html_url'] ?? null,
                'avatar'  => $c['author']['avatar_url'] ?? null,
            ], $response);
        });
    }

    /**
     * Get 52-week commit activity for the heatmap.
     * Returns an array of 52 weeks, each with 7 days (Sun→Sat) and commit counts.
     *
     * GitHub may return 202 (still computing) — in that case returns empty array.
     */
    public function commitActivity(string $repoUrl): array
    {
        $ownerRepo = $this->parseOwnerRepo($repoUrl);
        if (!$ownerRepo) {
            return [];
        }

        // Do not use Cache::remember here — if GitHub returns 202 (still computing)
        // we get an empty result and must NOT cache it, otherwise the heatmap stays
        // empty for the entire TTL even after GitHub finishes computing.
        $cacheKey = "github.{$ownerRepo}.activity";

        if (Cache::has($cacheKey)) {
            return Cache::get($cacheKey);
        }

        $response = $this->request("repos/{$ownerRepo}/stats/commit_activity", [], true);

        if (!$response || !is_array($response)) {
            return []; // 202 or error — don't cache, retry on next request
        }

        $data = array_map(fn ($week) => [
            'week'  => $week['week'] ?? 0,
            'days'  => $week['days'] ?? [],
            'total' => $week['total'] ?? 0,
        ], $response);

        Cache::put($cacheKey, $data, self::CACHE_TTL);

        return $data;
    }

    /**
     * Make a GET request to the GitHub API.
     *
     * @param bool $allowAccepted  If true, returns null on 202 (data still computing)
     */
    private function request(string $endpoint, array $params = [], bool $allowAccepted = false): ?array
    {
        $http = Http::withHeaders([
            'Accept'               => 'application/vnd.github+json',
            'X-GitHub-Api-Version' => '2022-11-28',
        ]);

        if ($this->pat) {
            $http = $http->withToken($this->pat);
        }

        $response = $http->get(self::BASE_URL . '/' . $endpoint, $params);

        if ($allowAccepted && $response->status() === 202) {
            return null; // GitHub is still computing stats
        }

        if (!$response->successful()) {
            return null;
        }

        return $response->json();
    }
}
