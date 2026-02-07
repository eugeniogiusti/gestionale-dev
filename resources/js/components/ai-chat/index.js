import { scrollMessagesToBottom } from './utils/scroll.js';
import { readOpenState, writeOpenState } from './utils/storage.js';
import { createInitialState } from './state.js';
import {
    loadHistory as loadHistoryAction,
    resetConversation,
    sendMessage as sendMessageAction,
} from './chatFlow.js';

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

        init() {
            this.open = readOpenState(openKey);
            this.loadHistory();
        },

        toggle() {
            this.open = !this.open;
            writeOpenState(openKey, this.open);
            if (this.open) {
                this.$nextTick(() => this.scrollToBottom());
            }
        },

        async loadHistory() {
            await loadHistoryAction(this, deps);
        },

        async reset() {
            await resetConversation(this, deps);
        },

        async send() {
            const content = this.input.trim();
            if (!content || this.loading || !deps.chatEndpoint) return;

            await sendMessageAction(this, deps, content, true);
        },

        async retry() {
            if (!this.lastUserMessage || this.loading) return;
            await sendMessageAction(this, deps, this.lastUserMessage, false);
        },

        csrfToken() {
            const meta = document.querySelector('meta[name="csrf-token"]');
            return meta ? meta.getAttribute('content') : '';
        },

        scrollToBottom() {
            scrollMessagesToBottom(this.$refs.messages);
        },
    };
}
