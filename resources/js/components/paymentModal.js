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
            is_paid: true, // Default: pagamento incassato
            amount: '',
            currency: 'EUR',
            paid_at: '',
            due_date: '',
            method: 'bank',
            reference: '',
            notes: ''
        },

        /**
         * Reset form data to defaults
         */
        resetForm() {
            this.formData = {
                is_paid: true,
                amount: '',
                currency: 'EUR',
                paid_at: '',
                due_date: '',
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
            // Setta data odierna di default se incassato
            this.formData.paid_at = new Date().toISOString().split('T')[0];
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
                // Determina se è incassato in base a paid_at
                const isPaid = payment.paid_at !== null;
                
                this.formData = {
                    is_paid: isPaid,
                    amount: payment.amount || '',
                    currency: payment.currency || 'EUR',
                    paid_at: payment.paid_at || '',
                    due_date: payment.due_date || '',
                    method: payment.method || 'bank',
                    reference: payment.reference || '',
                    notes: payment.notes || ''
                };
            }
        },

        /**
         * Watch is_paid to clear opposite field
         */
        init() {
            this.$watch('formData.is_paid', (value) => {
                if (value) {
                    // Se incassato: setta paid_at a oggi (se vuoto), pulisci due_date
                    if (!this.formData.paid_at) {
                        this.formData.paid_at = new Date().toISOString().split('T')[0];
                    }
                    this.formData.due_date = '';
                } else {
                    // Se NON incassato: pulisci paid_at
                    this.formData.paid_at = '';
                }
            });
        }
    };
}