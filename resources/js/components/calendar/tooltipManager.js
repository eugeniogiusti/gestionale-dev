import { t } from './translations';

export function showTooltip(info) {
    const props = info.event.extendedProps;
    const tooltipContent = buildTooltipContent(info.event.title, props);
    
    const tooltip = document.createElement('div');
    tooltip.id = 'calendar-tooltip';
    tooltip.innerHTML = tooltipContent;
    tooltip.style.position = 'absolute';
    tooltip.style.zIndex = '9999';
    tooltip.style.pointerEvents = 'none';
    
    document.body.appendChild(tooltip);
    positionTooltip(tooltip, info.el);
}

export function hideTooltip() {
    const tooltip = document.getElementById('calendar-tooltip');
    if (tooltip) {
        tooltip.remove();
    }
}

function buildTooltipContent(title, props) {
    let content = `<div class="p-3 bg-gray-900 text-white rounded-lg shadow-lg text-sm max-w-xs">`;
    content += `<div class="font-semibold mb-2">${title}</div>`;
    
    if (props.type === 'project') {
        content += buildProjectTooltip(props);
    } else if (props.type === 'meeting') {
        content += buildMeetingTooltip(props);
    } else if (props.type === 'task') {
        content += buildTaskTooltip(props);
    }
    
    content += `<div class="text-gray-400 text-xs mt-2 italic">${t('click_to_view')}</div>`;
    content += `</div>`;
    
    return content;
}

function buildProjectTooltip(props) {
    let html = '';
    if (props.client) {
        html += `<div class="text-gray-300 text-xs mb-1"><span class="font-medium">${t('client')}:</span> ${props.client}</div>`;
    }
    html += `<div class="text-gray-300 text-xs mb-1"><span class="font-medium">${t('status')}:</span> ${props.status}</div>`;
    if (props.priority) {
        html += `<div class="text-gray-300 text-xs"><span class="font-medium">${t('priority')}:</span> ${props.priority}</div>`;
    }
    return html;
}

function buildMeetingTooltip(props) {
    let html = `<div class="text-gray-300 text-xs mb-1"><span class="font-medium">${t('project')}:</span> ${props.project}</div>`;
    if (props.client) {
        html += `<div class="text-gray-300 text-xs mb-1"><span class="font-medium">${t('client')}:</span> ${props.client}</div>`;
    }
    if (props.location) {
        html += `<div class="text-gray-300 text-xs"><span class="font-medium">${t('location')}:</span> ${props.location}</div>`;
    }
    return html;
}

function buildTaskTooltip(props) {
    let html = `<div class="text-gray-300 text-xs mb-1"><span class="font-medium">${t('project')}:</span> ${props.project}</div>`;
    if (props.client) {
        html += `<div class="text-gray-300 text-xs mb-1"><span class="font-medium">${t('client')}:</span> ${props.client}</div>`;
    }
    html += `<div class="text-gray-300 text-xs mb-1"><span class="font-medium">${t('status')}:</span> ${props.status}</div>`;
    if (props.priority) {
        html += `<div class="text-gray-300 text-xs"><span class="font-medium">${t('priority')}:</span> ${props.priority}</div>`;
    }
    if (props.isOverdue) {
        html += `<div class="text-red-400 text-xs font-semibold mt-1">⚠️ ${t('overdue')}</div>`;
    }
    return html;
}

function positionTooltip(tooltip, element) {
    const rect = element.getBoundingClientRect();
    tooltip.style.top = `${rect.top - tooltip.offsetHeight - 10}px`;
    tooltip.style.left = `${rect.left + (rect.width / 2) - (tooltip.offsetWidth / 2)}px`;
}