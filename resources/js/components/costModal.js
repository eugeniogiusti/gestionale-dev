/**
 * Cost Modal Component
 * Handles create/edit modal for costs in project context
 */
export default function costModal(projectCosts = []) {
    return {
        open: false,
        isEdit: false,
        costId: null,
        formData: {
            amount: '',
            currency: 'EUR',
            type: 'tool',
            recurring: false,
            recurring_period: '',
            paid_at: '',
            notes: ''
        },

        /**
         * Reset form data to defaults
         */
        resetForm() {
            this.formData = {
                amount: '',
                currency: 'EUR',
                type: 'tool',
                recurring: false,
                recurring_period: '',
                paid_at: '',
                notes: ''
            };
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
        openEdit(costId) {
            this.isEdit = true;
            this.costId = costId;
            this.loadCost(costId);
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
         * Load cost data for editing
         */
        loadCost(costId) {
            const cost = projectCosts.find(c => c.id === costId);
            
            if (cost) {
                this.formData = {
                    amount: cost.amount || '',
                    currency: cost.currency || 'EUR',
                    type: cost.type || 'tool',
                    recurring: cost.recurring || false,
                    recurring_period: cost.recurring_period || '',
                    paid_at: cost.paid_at || '',
                    notes: cost.notes || ''
                };
            }
        }
    };
}