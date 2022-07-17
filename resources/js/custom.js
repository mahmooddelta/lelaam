export const scrollToBottom = identifier => {
    const container = document.querySelector(identifier);
    container.scrollTop = container.scrollHeight - container.clientHeight;
}
