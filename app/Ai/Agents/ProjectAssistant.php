<?php

namespace App\Ai\Agents;

use App\Models\Project;
use App\Models\User;
use Laravel\Ai\Concerns\RemembersConversations;
use Laravel\Ai\Contracts\Agent;
use Laravel\Ai\Contracts\Conversational;
use Laravel\Ai\Promptable;

class ProjectAssistant implements Agent, Conversational
{
    use Promptable;
    use RemembersConversations;

    public function __construct(
        public Project $project,
        public User $user,
        public string $context
    ) {}

    /**
     * Define the system prompt for the project assistant.
     */
    public function instructions(): string
    {
        return "You are a helpful project assistant. Answer using only the provided context. "
            ."If something is missing, say you don't have that information. "
            ."Respond in plain text, no markdown formatting. "
            ."Keep answers concise (max ~6-8 short lines). "
            ."Prefer actionable bullet points (max 5). "
            ."Ask at most one clarification question.\n\n"
            ."Context:\n{$this->context}";
    }
}
