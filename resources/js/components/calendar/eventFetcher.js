export async function fetchEvents(filters, info, successCallback, failureCallback) {
    try {
        const params = new URLSearchParams({
            start: info.startStr,
            end: info.endStr,
        });

        // Add type filters
        filters.type.forEach(type => {
            params.append('type[]', type);
        });

        // Add client filter
        if (filters.client_id) {
            params.append('client_id', filters.client_id);
        }

        // Add status filters
        filters.status.forEach(status => {
            params.append('status[]', status);
        });

        // Add priority filters
        filters.priority.forEach(priority => {
            params.append('priority[]', priority);
        });

        const response = await fetch(`/calendar/events?${params.toString()}`);
        const events = await response.json();
        
        successCallback(events);
    } catch (error) {
        console.error('Error fetching calendar events:', error);
        failureCallback(error);
    }
}