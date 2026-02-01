export default function clientModal() {
    return {
        open: false,
        isEdit: false,
        clientId: null,
        activeTab: 'basic',
        backTo: '',
        formData: {},

        init() {
            this.formData = this.getEmptyForm();
        },

        getEmptyForm() {
            return {
                // Basic
                name: '',
                email: '',
                status: 'lead',
                vat_number: '',
                phone_prefix: '',
                phone: '',
                pec: '',
                // Billing
                billing_address: '',
                billing_city: '',
                billing_zip: '',
                billing_province: '',
                billing_country: '',
                billing_recipient_code: '',
                // Web
                website: '',
                linkedin: '',
                notes: ''
            };
        },

        resetForm() {
            this.formData = this.getEmptyForm();
            this.isEdit = false;
            this.clientId = null;
            this.activeTab = 'basic';
            this.backTo = '';
        },

        openCreate() {
            this.resetForm();
            this.open = true;
        },

        openEdit(clientData) {
            this.isEdit = true;
            this.clientId = clientData.id;
            this.backTo = clientData._back || '';
            this.formData = { ...clientData };
            this.open = true;
        },

        closeModal() {
            this.open = false;
            this.resetForm();
        }
    }
}
