/**
 * Cost Modal Component
 * Handles create/edit modal for costs in project context
 */
export default function costModal() {
    return {
        open: false,
        isEdit: false,
        costId: null,
        formData: {},

        init() {
            this.formData = this.getEmptyForm();
        },

        getEmptyForm() {
            return {
                amount: '',
                currency: 'EUR',
                type: 'tool',
                recurring: false,
                recurring_period: '',
                paid_at: '',
                notes: ''
            };
        },

        /**
         * Reset form data to defaults
         */
        resetForm() {
            this.formData = this.getEmptyForm();
            this.isEdit = false;
            this.costId = null;
        },

        /**
         * Open modal for creating new cost
         */
        openCreate() {
            this.resetForm();
            this.open = true;
        },

        /**
         * Open modal for editing existing cost
         */
        openEdit(costData) {
            this.isEdit = true;
            this.costId = costData.id;
            this.formData = {
                amount: costData.amount || '',
                currency: costData.currency || 'EUR',
                type: costData.type || 'tool',
                recurring: Boolean(costData.recurring),
                recurring_period: costData.recurring_period || '',
                paid_at: this.formatDateForInput(costData.paid_at),
                notes: costData.notes || ''
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
         * Format date string for date input (YYYY-MM-DD)
         */
        formatDateForInput(dateString) {
            if (!dateString) return '';
            const date = new Date(dateString);
            if (isNaN(date.getTime())) return '';
            return date.toISOString().split('T')[0];
        }
    };
}