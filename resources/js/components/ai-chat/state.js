export function createInitialState(projectName) {
    return {
        open: false,
        messages: [],
        input: '',
        loading: false,
        streaming: false,
        loadingHistory: false,
        error: null,
        errorCode: null,
        lastUserMessage: null,
        projectName,
    };
}

export function beginMessageRequest(vm, content, addUserMessage) {
    if (addUserMessage) {
        vm.messages.push({ role: 'user', content });
    }

    vm.messages.push({ role: 'assistant', content: '' });
    const assistantIndex = vm.messages.length - 1;

    vm.lastUserMessage = content;
    vm.input = '';
    vm.loading = true;
    vm.streaming = false;
    vm.error = null;
    vm.errorCode = null;

    return assistantIndex;
}

export function appendAssistantDelta(vm, assistantIndex, delta) {
    const current = vm.messages[assistantIndex]?.content || '';
    vm.messages[assistantIndex].content = current + sanitizeAssistantText(delta);
}

export function setRequestError(vm, errorText, errorCode = 'error') {
    vm.error = errorText;
    vm.errorCode = errorCode;
}

export function finishMessageRequest(vm, assistantIndex) {
    const assistant = vm.messages[assistantIndex];
    if (assistant && assistant.role === 'assistant' && !assistant.content.trim() && vm.error) {
        vm.messages.splice(assistantIndex, 1);
    }

    vm.loading = false;
    vm.streaming = false;
}

export function resetConversationState(vm) {
    vm.messages = [];
    vm.error = null;
    vm.errorCode = null;
    vm.lastUserMessage = null;
}

function sanitizeAssistantText(content) {
    return String(content ?? '').replace(/\*\*/g, '');
}
