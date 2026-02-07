/**
 * Meeting Modal Component
 * Handles create/edit modal for meetings in project context
 */
export default function meetingModal() {
    return {
        open: false,
        isEdit: false,
        meetingId: null,
        formData: {},

        init() {
            this.formData = this.getEmptyForm();
        },

        getEmptyForm() {
            return {
                title: '',
                description: '',
                scheduled_at: '',
                duration_minutes: 60,
                location: '',
                meeting_url: '',
                status: 'scheduled',
                notes: ''
            };
        },

        /**
         * Reset form data to defaults
         */
        resetForm() {
            this.formData = this.getEmptyForm();
            this.isEdit = false;
            this.meetingId = null;
        },

        /**
         * Open modal for creating new meeting
         */
        openCreate() {
            this.resetForm();
            this.open = true;
        },

        /**
         * Open modal for editing existing meeting
         */
        openEdit(meetingData) {
            this.isEdit = true;
            this.meetingId = meetingData.id;
            this.formData = {
                title: meetingData.title || '',
                description: meetingData.description || '',
                scheduled_at: meetingData.scheduled_at ? this.formatDateTimeForInput(meetingData.scheduled_at) : '',
                duration_minutes: meetingData.duration_minutes || 60,
                location: meetingData.location || '',
                meeting_url: meetingData.meeting_url || '',
                status: meetingData.status || 'scheduled',
                notes: meetingData.notes || ''
            };
            this.open = true;
        },

        /**
         * Close modal and reset form after animation
         */
        closeModal() {
            this.open = false;
            setTimeout(() => this.resetForm(), 300);
        },

        /**
         * Format datetime string for datetime-local input
         * Converts "2024-01-20 15:30:00" to "2024-01-20T15:30"
         */
        formatDateTimeForInput(dateTimeString) {
            const date = new Date(dateTimeString);
            const year = date.getFullYear();
            const month = String(date.getMonth() + 1).padStart(2, '0');
            const day = String(date.getDate()).padStart(2, '0');
            const hours = String(date.getHours()).padStart(2, '0');
            const minutes = String(date.getMinutes()).padStart(2, '0');

            return `${year}-${month}-${day}T${hours}:${minutes}`;
        }
    };
}