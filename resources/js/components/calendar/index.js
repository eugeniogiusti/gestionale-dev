import { initCalendar } from './calendarInit';

export default function calendar() {
    return {
        calendar: null,
        filters: {
            type: ['projects', 'meetings', 'tasks'],
            client_id: '',
            status: [],
            priority: [],
        },

        init() {
            const element = document.getElementById('calendar');
            this.calendar = initCalendar(element, this.filters);
        },

        refetchEvents() {
            if (this.calendar) {
                this.calendar.refetchEvents();
            }
        },

        resetFilters() {
            this.filters = {
                type: ['projects', 'meetings', 'tasks'],
                client_id: '',
                status: [],
                priority: [],
            };
            this.refetchEvents();
        },
    };
}