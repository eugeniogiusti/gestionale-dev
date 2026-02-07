export function scrollMessagesToBottom(messagesRef) {
    if (!messagesRef) return;
    messagesRef.scrollTop = messagesRef.scrollHeight;
}
