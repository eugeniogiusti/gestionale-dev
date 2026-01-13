// resources/js/components/ClientForm.js

export default function () {
    return {
        activeTab: 'basic',
        errors: JSON.parse(this.$el.getAttribute('data-errors') || '{}'),
        
        init() {
            // if there are errors, open the tab containing the first error
            this.checkAndOpenTabWithErrors();
        },
        
        hasErrors(tab) {
            const errorFields = {
                'basic': ['name', 'email', 'status', 'vat_number', 'phone', 'phone_prefix'],
                'billing': ['billing_address', 'billing_city', 'billing_zip', 'billing_province', 'billing_country', 'billing_recipient_code', 'pec'],
                'web': ['website', 'linkedin', 'notes']
            };
            return errorFields[tab]?.some(field => this.errors[field]) || false;
        },
        
        checkAndOpenTabWithErrors() {
            const tabs = ['basic', 'billing', 'web'];
            for (const tab of tabs) {
                if (this.hasErrors(tab)) {
                    this.activeTab = tab;
                    break;
                }
            }
        }
    };
}