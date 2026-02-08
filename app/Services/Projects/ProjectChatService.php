<?php

namespace App\Services\Projects;

use App\Ai\Agents\ProjectAssistant;
use App\Models\AiSettings;
use App\Models\Project;
use App\Queries\Projects\ProjectProfitStatsQuery;
use App\Queries\Projects\ProjectShowQuery;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Laravel\Ai\Responses\StreamableAgentResponse;
use Laravel\Ai\Responses\StreamedAgentResponse;

/**
 * AI-powered chat assistant for individual projects.
 *
 * Integrates with Laravel AI (OpenAI provider) through the ProjectAssistant agent.
 * Supports both synchronous (chat) and streaming (stream) responses.
 *
 * How it works:
 * 1. Gathers project context (tasks, meetings, payments, costs, profit stats).
 * 2. Feeds it to the ProjectAssistant AI agent as system context.
 * 3. Maintains conversation continuity via session-stored conversation IDs.
 * 4. Conversation messages are persisted in the `agent_conversation_messages` table.
 *
 * @see \App\Ai\Agents\ProjectAssistant
 */
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
        $agent = $this->buildAgent($project, $request);

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
            $this->rememberConversation($project, $request, $conversationId);
        }

        return [
            'message' => (string) $response,
            'conversation_id' => $conversationId,
        ];
    }

    /**
     * Build a streamable response for project chat.
     */
    public function stream(Project $project, Request $request, string $message, AiSettings $aiSettings): StreamableAgentResponse
    {
        config(['ai.providers.openai.key' => $aiSettings->ai_api_key]);
        $agent = $this->buildAgent($project, $request);

        $sessionKey = "project_chat.{$project->id}";
        $conversationId = $request->session()->get($sessionKey);
        $isNewConversation = !$conversationId;

        $stream = $conversationId
            ? $agent->continue($conversationId, as: $request->user())->stream($message)
            : $agent->forUser($request->user())->stream($message);

        $stream->then(function (StreamedAgentResponse $response) use (
            $project,
            $request,
            $conversationId,
            $isNewConversation
        ): void {
            $resolvedConversationId = $response->conversationId ?: $conversationId;

            if (!$resolvedConversationId) {
                return;
            }

            if ($isNewConversation) {
                $this->rememberConversation($project, $request, $resolvedConversationId);
                return;
            }

            $request->session()->put("project_chat.{$project->id}", $resolvedConversationId);
        });

        return $stream;
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

    /**
     * Create an agent instance with fresh project context.
     */
    private function buildAgent(Project $project, Request $request): ProjectAssistant
    {
        $showData = (new ProjectShowQuery($project, 10))->handle();
        $profit = $this->profitStats->handle($project);
        $context = $this->buildContext($project, $showData, $profit);

        return ProjectAssistant::make(
            project: $project,
            user: $request->user(),
            context: $context
        );
    }

    /**
     * Persist conversation id in session and set a readable title.
     */
    private function rememberConversation(Project $project, Request $request, string $conversationId): void
    {
        $request->session()->put("project_chat.{$project->id}", $conversationId);

        DB::table('agent_conversations')
            ->where('id', $conversationId)
            ->update(['title' => $project->name]);
    }
}
