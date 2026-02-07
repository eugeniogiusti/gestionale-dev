export async function consumeSse(responseBody, onPayload) {
    const reader = responseBody.getReader();
    const decoder = new TextDecoder();
    let buffer = '';

    while (true) {
        const { done, value } = await reader.read();
        if (done) break;

        buffer += decoder.decode(value, { stream: true });
        const chunks = buffer.split('\n\n');
        buffer = chunks.pop() || '';

        for (const chunk of chunks) {
            const payload = parseSseChunk(chunk);
            if (payload) onPayload(payload);
        }
    }

    if (buffer.trim() !== '') {
        const payload = parseSseChunk(buffer);
        if (payload) onPayload(payload);
    }
}

function parseSseChunk(chunk) {
    const dataLine = chunk
        .split('\n')
        .find((line) => line.startsWith('data: '));

    if (!dataLine) return null;

    try {
        return JSON.parse(dataLine.slice(6));
    } catch (err) {
        return null;
    }
}
