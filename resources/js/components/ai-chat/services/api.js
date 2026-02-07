export async function readJson(response) {
    return response.json().catch(() => ({}));
}

export async function requestHistory(historyEndpoint) {
    return fetch(historyEndpoint, {
        headers: {
            'Accept': 'application/json',
        },
    });
}

export async function requestReset(resetEndpoint, csrfToken) {
    return fetch(resetEndpoint, {
        method: 'DELETE',
        headers: {
            'X-CSRF-TOKEN': csrfToken,
            'Accept': 'application/json',
        },
    });
}

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
