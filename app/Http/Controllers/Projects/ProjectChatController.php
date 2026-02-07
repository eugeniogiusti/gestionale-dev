<?php

namespace App\Http\Controllers\Projects;

use App\Http\Controllers\Controller;
use App\Http\Requests\Projects\ProjectChatRequest;
use App\Models\Project;
use App\Models\AiSettings;
use Illuminate\Http\JsonResponse;
use App\Services\Projects\ProjectChatService;
use Laravel\Ai\Exceptions\AiException;
use Laravel\Ai\Exceptions\ProviderOverloadedException;
use Laravel\Ai\Exceptions\RateLimitedException;
use Laravel\Ai\Streaming\Events\TextDelta;
use Symfony\Component\HttpFoundation\StreamedResponse;
use Throwable;

class ProjectChatController extends Controller
{
    /**
     * Handle chat prompt for a project and return the AI response.
     */
    public function chat(
        Project $project,
        ProjectChatRequest $request,
        ProjectChatService $service
    ): JsonResponse {
        $aiSettings = AiSettings::current();

        if (!$aiSettings->ai_enabled || !$aiSettings->ai_api_key) {
            return response()->json([
                'message' => __('ai.error_generic'),
                'code' => 'disabled',
            ], 403);
        }

        try {
            $payload = $service->chat($project, $request, $request->validated()['message'], $aiSettings);
        } catch (RateLimitedException $e) {
            return response()->json([
                'message' => __('ai.error_rate_limited'),
                'code' => 'rate_limited',
            ], 429);
        } catch (ProviderOverloadedException $e) {
            return response()->json([
                'message' => __('ai.error_provider_overloaded'),
                'code' => 'provider_overloaded',
            ], 503);
        } catch (AiException $e) {
            $message = $this->mapAiErrorMessage($e->getMessage());
            $status = $message['status'];

            return response()->json([
                'message' => $message['text'],
                'code' => $message['code'],
            ], $status);
        } catch (Throwable $e) {
            return response()->json([
                'message' => __('ai.error_generic'),
                'code' => 'error',
            ], 500);
        }

        return response()->json($payload);
    }

    /**
     * Stream chat response for progressive rendering in the frontend.
     */
    public function stream(
        Project $project,
        ProjectChatRequest $request,
        ProjectChatService $service
    ): StreamedResponse|JsonResponse {
        $aiSettings = AiSettings::current();

        if (!$aiSettings->ai_enabled || !$aiSettings->ai_api_key) {
            return response()->json([
                'message' => __('ai.error_generic'),
                'code' => 'disabled',
            ], 403);
        }

        $stream = $service->stream($project, $request, $request->validated()['message'], $aiSettings);

        return response()->stream(function () use ($stream): void {
            try {
                foreach ($stream as $event) {
                    if ($event instanceof TextDelta) {
                        $this->emitSse([
                            'type' => 'delta',
                            'delta' => $event->delta,
                        ]);
                    }
                }

                $this->emitSse(['type' => 'done']);
            } catch (RateLimitedException $e) {
                $this->emitSse([
                    'type' => 'error',
                    'message' => __('ai.error_rate_limited'),
                    'code' => 'rate_limited',
                ]);
            } catch (ProviderOverloadedException $e) {
                $this->emitSse([
                    'type' => 'error',
                    'message' => __('ai.error_provider_overloaded'),
                    'code' => 'provider_overloaded',
                ]);
            } catch (AiException $e) {
                $mapped = $this->mapAiErrorMessage($e->getMessage());

                $this->emitSse([
                    'type' => 'error',
                    'message' => $mapped['text'],
                    'code' => $mapped['code'],
                ]);
            } catch (Throwable $e) {
                $this->emitSse([
                    'type' => 'error',
                    'message' => __('ai.error_generic'),
                    'code' => 'error',
                ]);
            }
        }, 200, [
            'Content-Type' => 'text/event-stream',
            'Cache-Control' => 'no-cache, no-transform',
            'Connection' => 'keep-alive',
            'X-Accel-Buffering' => 'no',
        ]);
    }

    /**
     * Return persisted chat history for the current project session.
     */
    public function history(Project $project, \Illuminate\Http\Request $request, ProjectChatService $service): JsonResponse
    {
        $aiSettings = AiSettings::current();

        return response()->json([
            ...$service->history($project, $request, $aiSettings),
        ]);
    }

    /**
     * Reset the current project chat session (new conversation).
     */
    public function reset(Project $project, \Illuminate\Http\Request $request): JsonResponse
    {
        $sessionKey = "project_chat.{$project->id}";
        $request->session()->forget($sessionKey);

        return response()->json([
            'message' => __('ai.reset_done'),
        ]);
    }

    private function mapAiErrorMessage(string $raw): array
    {
        $lower = strtolower($raw);

        if (str_contains($lower, 'invalid_api_key') ||
            str_contains($lower, 'incorrect api key') ||
            str_contains($lower, 'unauthorized') ||
            str_contains($lower, '401')) {
            return ['text' => __('ai.error_invalid_key'), 'status' => 401, 'code' => 'invalid_key'];
        }

        if (str_contains($lower, 'insufficient_quota') ||
            str_contains($lower, 'quota') ||
            str_contains($lower, 'billing') ||
            str_contains($lower, 'payment')) {
            return ['text' => __('ai.error_quota'), 'status' => 402, 'code' => 'quota'];
        }

        return ['text' => __('ai.error_generic'), 'status' => 500, 'code' => 'error'];
    }

    /**
     * Emit one SSE data event.
     */
    private function emitSse(array $payload): void
    {
        echo 'data: '.json_encode($payload, JSON_UNESCAPED_UNICODE)."\n\n";

        if (function_exists('ob_flush')) {
            @ob_flush();
        }

        flush();
    }
}
