import { Calendar } from '@fullcalendar/core';
import dayGridPlugin from '@fullcalendar/daygrid';
import timeGridPlugin from '@fullcalendar/timegrid';
import listPlugin from '@fullcalendar/list';
import interactionPlugin from '@fullcalendar/interaction';
import { t } from './translations';
import { fetchEvents } from './eventFetcher';
import { handleEventClick } from './eventHandlers';
import { showTooltip, hideTooltip } from './tooltipManager';

export function initCalendar(element, filters, refetchCallback) {
    const calendar = new Calendar(element, {
        plugins: [dayGridPlugin, timeGridPlugin, listPlugin, interactionPlugin],
        initialView: 'dayGridMonth',
        
        headerToolbar: {
            left: 'prev,next today',
            center: 'title',
            right: 'dayGridMonth,timeGridWeek,timeGridDay,listMonth'
        },

        buttonText: {
            today: t('today'),
            month: t('month_view'),
            week: t('week_view'),
            day: t('day_view'),
            list: 'List'
        },

        height: 'auto',
        locale: document.documentElement.lang || 'en',
        
        events: (info, successCallback, failureCallback) => {
            fetchEvents(filters, info, successCallback, failureCallback);
        },

        eventClick: handleEventClick,
        eventMouseEnter: showTooltip,
        eventMouseLeave: hideTooltip,

        eventClassNames: () => ['cursor-pointer', 'transition-all', 'hover:opacity-80'],
    });

    calendar.render();
    return calendar;
}