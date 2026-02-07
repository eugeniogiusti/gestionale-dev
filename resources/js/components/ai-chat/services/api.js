/**
 * Safe JSON decode helper for non-critical endpoints.
 */
export async function readJson(response) {
    return response.json().catch(() => ({}));
}

/**
 * GET conversation history for current project/session.
 */
export async function requestHistory(historyEndpoint) {
    return fetch(historyEndpoint, {
        headers: {
            'Accept': 'application/json',
        },
    });
}

/**
 * DELETE current project conversation session.
 */
export async function requestReset(resetEndpoint, csrfToken) {
    return fetch(resetEndpoint, {
        method: 'DELETE',
        headers: {
            'X-CSRF-TOKEN': csrfToken,
            'Accept': 'application/json',
        },
    });
}

/**
 * Classic JSON chat request (single final message).
 */
export async function requestChat(chatEndpoint, csrfToken, message) {
    return fetch(chatEndpoint, {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': csrfToken,
        },
        body: JSON.stringify({ message }),
    });
}

/**
 * Stream chat request (SSE text deltas).
 */
export async function requestChatStream(streamEndpoint, csrfToken, message) {
    return fetch(streamEndpoint, {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'Accept': 'text/event-stream',
            'X-CSRF-TOKEN': csrfToken,
        },
        body: JSON.stringify({ message }),
    });
}
