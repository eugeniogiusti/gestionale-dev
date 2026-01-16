<?php

namespace App\Queries;

use App\Models\Task;

class TaskStatsQuery
{
    /**
     * Handle the query and return task statistics
     */
    public function handle(): array
    {
        return [
            'todo' => $this->getTodoCount(),
            'in_progress' => $this->getInProgressCount(),
            'blocked' => $this->getBlockedCount(),
            'bugs_open' => $this->getOpenBugsCount(),
        ];
    }

    /**
     * Get todo tasks count
     */
    private function getTodoCount(): int
    {
        return Task::status('todo')->count();
    }

    /**
     * Get in-progress tasks count
     */
    private function getInProgressCount(): int
    {
        return Task::status('in_progress')->count();
    }

    /**
     * Get blocked tasks count
     */
    private function getBlockedCount(): int
    {
        return Task::status('blocked')->count();
    }

    /**
     * Get open bugs count
     */
    private function getOpenBugsCount(): int
    {
        return Task::type('bug')->open()->count();
    }
}