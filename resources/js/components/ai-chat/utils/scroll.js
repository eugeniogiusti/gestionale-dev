// Keep message viewport anchored to latest content.
export function scrollMessagesToBottom(messagesRef) {
    if (!messagesRef) return;
    messagesRef.scrollTop = messagesRef.scrollHeight;
}
