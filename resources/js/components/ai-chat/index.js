import { scrollMessagesToBottom } from './utils/scroll.js';
import { readOpenState, writeOpenState } from './utils/storage.js';
import { createInitialState } from './state.js';
import {
    loadHistory as loadHistoryAction,
    resetConversation,
    sendMessage as sendMessageAction,
} from './chatFlow.js';

/**
 * Alpine orchestrator for AI chat UI.
 * Keeps DOM concerns here and delegates business flow/state mutations to dedicated modules.
 */
export default function aiChat(el) {
    const chatEndpoint = el?.dataset?.aiEndpoint || '';
    const streamEndpoint = el?.dataset?.aiStreamEndpoint || '';
    const historyEndpoint = el?.dataset?.aiHistoryEndpoint || '';
    const resetEndpoint = el?.dataset?.aiResetEndpoint || '';
    const projectName = el?.dataset?.projectName || 'Project';
    const projectId = el?.dataset?.projectId || 'global';
    const errorText = el?.dataset?.errorText || 'Errore';
    const openKey = `ai_chat_open_${projectId}`;

    const deps = {
        chatEndpoint,
        streamEndpoint,
        historyEndpoint,
        resetEndpoint,
        errorText,
    };

    return {
        ...createInitialState(projectName),

        // Restore panel state and preload history once component mounts.
        init() {
            this.open = readOpenState(openKey);
            this.loadHistory();
        },

        // UI toggle only. Persist per-project open state in localStorage.
        toggle() {
            this.open = !this.open;
            writeOpenState(openKey, this.open);
            if (this.open) {
                this.$nextTick(() => this.scrollToBottom());
            }
        },

        // Delegates history retrieval to chat flow use-case.
        async loadHistory() {
            await loadHistoryAction(this, deps);
        },

        // Delegates server-side conversation reset and local state cleanup.
        async reset() {
            await resetConversation(this, deps);
        },

        // Sends a fresh user message from input.
        async send() {
            const content = this.input.trim();
            if (!content || this.loading || !deps.chatEndpoint) return;

            await sendMessageAction(this, deps, content, true);
        },

        // Replays the last user message after recoverable errors.
        async retry() {
            if (!this.lastUserMessage || this.loading) return;
            await sendMessageAction(this, deps, this.lastUserMessage, false);
        },

        // Shared CSRF helper used by flow/api calls.
        csrfToken() {
            const meta = document.querySelector('meta[name="csrf-token"]');
            return meta ? meta.getAttribute('content') : '';
        },

        // Centralized scroll to keep UX behavior consistent.
        scrollToBottom() {
            scrollMessagesToBottom(this.$refs.messages);
        },
    };
}
