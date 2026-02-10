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
        return "You are a proactive project assistant. Use the provided context to give the best possible answer. "
            ."Work with the information you have: make reasonable inferences, suggest solutions, and be helpful. "
            ."Never say you lack information or context — instead, use what you know and offer your best guidance. "
            ."If something is ambiguous, give your best interpretation and move forward. "
            ."Respond in plain text, no markdown formatting. "
            ."Keep answers concise (max ~6-8 short lines). "
            ."Prefer actionable bullet points (max 5).\n\n"
            ."Context:\n{$this->context}";
    }
}
