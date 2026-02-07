import {
    readJson,
    requestChat,
    requestChatStream,
    requestHistory,
    requestReset,
} from './services/api.js';
import { consumeSse } from './services/sse.js';
import {
    appendAssistantDelta,
    beginMessageRequest,
    finishMessageRequest,
    resetConversationState,
    setRequestError,
} from './state.js';

export async function loadHistory(vm, { historyEndpoint }) {
    if (!historyEndpoint) return;
    vm.loadingHistory = true;

    try {
        const response = await requestHistory(historyEndpoint);
        if (!response.ok) return;

        const data = await readJson(response);
        if (Array.isArray(data.messages)) {
            vm.messages = data.messages;
        }
    } catch (err) {
        // ignore history errors
    } finally {
        vm.loadingHistory = false;
        vm.$nextTick(() => vm.scrollToBottom());
    }
}

export async function resetConversation(vm, { resetEndpoint }) {
    if (!resetEndpoint || vm.loading) return;

    try {
        await requestReset(resetEndpoint, vm.csrfToken());
    } catch (err) {
        // ignore reset errors
    } finally {
        resetConversationState(vm);
        vm.$nextTick(() => vm.scrollToBottom());
    }
}

export async function sendMessage(vm, deps, content, addUserMessage) {
    const assistantIndex = beginMessageRequest(vm, content, addUserMessage);
    vm.$nextTick(() => vm.scrollToBottom());

    try {
        const streamWorked = await sendStream(vm, deps, content, assistantIndex);
        if (!streamWorked) {
            await sendClassic(vm, deps, content, assistantIndex);
        }
    } catch (err) {
        setRequestError(vm, deps.errorText, 'error');
    } finally {
        finishMessageRequest(vm, assistantIndex);
        vm.$nextTick(() => vm.scrollToBottom());
    }
}

async function sendStream(vm, { streamEndpoint, errorText }, content, assistantIndex) {
    if (!streamEndpoint || !window.ReadableStream) {
        return false;
    }

    vm.streaming = true;
    const response = await requestChatStream(streamEndpoint, vm.csrfToken(), content);

    if (!response.ok) {
        const data = await readJson(response);
        setRequestError(
            vm,
            data.message || errorText,
            data.code || (response.status === 429 ? 'rate_limited' : null)
        );
        return true;
    }

    if (!response.body) {
        return false;
    }

    await consumeSse(response.body, (payload) => handleStreamPayload(vm, payload, assistantIndex, errorText));
    return true;
}

function handleStreamPayload(vm, payload, assistantIndex, errorText) {
    if (payload.type === 'delta' && payload.delta) {
        appendAssistantDelta(vm, assistantIndex, payload.delta);
        vm.scrollToBottom();
        return;
    }

    if (payload.type === 'error') {
        setRequestError(vm, payload.message || errorText, payload.code || 'error');
    }
}

async function sendClassic(vm, { chatEndpoint, errorText }, content, assistantIndex) {
    const response = await requestChat(chatEndpoint, vm.csrfToken(), content);
    const data = await readJson(response);

    if (!response.ok) {
        setRequestError(
            vm,
            data.message || errorText,
            data.code || (response.status === 429 ? 'rate_limited' : null)
        );
        return;
    }

    if (!data.message) {
        setRequestError(vm, errorText, 'error');
        return;
    }

    vm.messages[assistantIndex].content = String(data.message).replace(/\*\*/g, '');
}
