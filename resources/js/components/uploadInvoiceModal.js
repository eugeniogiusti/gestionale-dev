/**
 * Upload Invoice Modal Component
 * Handles manual invoice upload for payments
 */
export default function uploadInvoiceModal() {
    return {
        open: false,
        paymentId: null,
        uploadUrl: '',

        /**
         * Open modal for payment
         */
        openModal(paymentId) {
            this.paymentId = paymentId;
            this.uploadUrl = `/invoices/payments/${paymentId}/upload`;
            this.open = true;
        },

        /**
         * Close modal
         */
        closeModal() {
            this.open = false;
            setTimeout(() => {
                this.paymentId = null;
                this.uploadUrl = '';
            }, 300);
        }
    };
}