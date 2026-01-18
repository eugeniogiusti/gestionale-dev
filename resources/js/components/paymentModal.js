/**
 * Payment Modal Component
 * Handles create/edit modal for payments in project context
 */
export default function paymentModal(projectPayments = []) {
    return {
        open: false,
        isEdit: false,
        paymentId: null,
        formData: {
            amount: '',
            currency: 'EUR',
            paid_at: '',
            method: 'bank',
            reference: '',
            notes: ''
        },

        /**
         * Reset form data to defaults
         */
        resetForm() {
            this.formData = {
                amount: '',
                currency: 'EUR',
                paid_at: '',
                method: 'bank',
                reference: '',
                notes: ''
            };
            this.isEdit = false;
            this.paymentId = null;
        },

        /**
         * Open modal for creating new payment
         */
        openCreate() {
            this.resetForm();
            this.open = true;
        },

        /**
         * Open modal for editing existing payment
         */
        openEdit(paymentId) {
            this.isEdit = true;
            this.paymentId = paymentId;
            this.loadPayment(paymentId);
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
         * Load payment data for editing
         */
        loadPayment(paymentId) {
            const payment = projectPayments.find(p => p.id === paymentId);
            
            if (payment) {
                this.formData = {
                    amount: payment.amount || '',
                    currency: payment.currency || 'EUR',
                    paid_at: payment.paid_at || '',
                    method: payment.method || 'bank',
                    reference: payment.reference || '',
                    notes: payment.notes || ''
                };
            }
        }
    };
}