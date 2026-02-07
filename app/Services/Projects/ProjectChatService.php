<?php

namespace App\Services\Projects;

use App\Ai\Agents\ProjectAssistant;
use App\Models\AiSettings;
use App\Models\Project;
use App\Queries\Projects\ProjectProfitStatsQuery;
use App\Queries\Projects\ProjectShowQuery;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProjectChatService
{
    public function __construct(
        private ProjectProfitStatsQuery $profitStats
    ) {}

    /**
     * Build context and prompt the AI agent for a project chat response.
     */
    public function chat(Project $project, Request $request, string $message, AiSettings $aiSettings): array
    {
        config(['ai.providers.openai.key' => $aiSettings->ai_api_key]);

        $showData = (new ProjectShowQuery($project, 10))->handle();
        $profit = $this->profitStats->handle($project);
        $context = $this->buildContext($project, $showData, $profit);

        $agent = ProjectAssistant::make(
            project: $project,
            user: $request->user(),
            context: $context
        );

        $sessionKey = "project_chat.{$project->id}";
        $conversationId = $request->session()->get($sessionKey);

        if ($conversationId) {
            $response = $agent
                ->continue($conversationId, as: $request->user())
                ->prompt($message);
        } else {
            $response = $agent
                ->forUser($request->user())
                ->prompt($message);
            $conversationId = $response->conversationId;
            $request->session()->put($sessionKey, $conversationId);

            DB::table('agent_conversations')
                ->where('id', $conversationId)
                ->update(['title' => $project->name]);
        }

        return [
            'message' => (string) $response,
            'conversation_id' => $conversationId,
        ];
    }

    /**
     * Load persisted conversation messages for the active project session.
     */
    public function history(Project $project, Request $request, AiSettings $aiSettings): array
    {
        if (!$aiSettings->ai_enabled || !$aiSettings->ai_api_key) {
            return [
                'messages' => [],
            ];
        }

        $sessionKey = "project_chat.{$project->id}";
        $conversationId = $request->session()->get($sessionKey);

        if (!$conversationId) {
            return [
                'messages' => [],
            ];
        }

        $messages = DB::table('agent_conversation_messages')
            ->where('conversation_id', $conversationId)
            ->where('user_id', $request->user()->id)
            ->orderBy('created_at')
            ->get(['role', 'content'])
            ->map(fn ($row) => [
                'role' => $row->role,
                'content' => $row->content,
            ])
            ->all();

        return [
            'messages' => $messages,
        ];
    }

    /**
     * Build a compact, human-readable context string for the agent.
     */
    private function buildContext(Project $project, array $showData, array $profit): string
    {
        $tasks = $showData['tasks']
            ->map(function ($t) {
                $desc = trim((string) $t->description);
                $suffix = $desc !== '' ? " — {$desc}" : '';
                return "{$t->title} ({$t->status}){$suffix}";
            })
            ->implode('; ');

        $meetings = $showData['meetings']
            ->map(fn ($m) => "{$m->title} ({$m->scheduled_at})")
            ->implode('; ');

        $payments = $showData['payments']
            ->map(fn ($p) => "{$p->amount} {$p->currency} ({$p->paid_at})")
            ->implode('; ');

        $costs = $showData['costs']
            ->map(fn ($c) => "{$c->amount} {$c->currency} ({$c->paid_at})")
            ->implode('; ');

        return trim(
            "PROJECT INFO:\n".
            "name: {$project->name}\n".
            "status: {$project->status}\n".
            "priority: {$project->priority}\n".
            "notes: {$project->notes}\n".
            "client: ".optional($project->client)->name."\n\n".
            "PROFIT:\n".
            "total payments: {$profit['total_payments']}\n".
            "total costs: {$profit['total_costs']}\n".
            "profit: {$profit['total_profit']}\n".
            "margin: {$profit['profit_margin']}\n\n".
            "TASKS (latest {$showData['tasks']->count()}):\n".
            ($tasks ?: 'none')."\n\n".
            "MEETINGS (latest {$showData['meetings']->count()}):\n".
            ($meetings ?: 'none')."\n\n".
            "PAYMENTS (latest {$showData['payments']->count()}):\n".
            ($payments ?: 'none')."\n\n".
            "COSTS (latest {$showData['costs']->count()}):\n".
            ($costs ?: 'none')
        );
    }
}
