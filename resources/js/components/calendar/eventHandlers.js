export function handleEventClick(info) {
    const url = info.event.extendedProps.url;
    if (url) {
        window.location.href = url;
    }
}