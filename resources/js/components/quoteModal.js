export default function quoteModal(quotes = []) {
    return {
        open: false,
        isEdit: false,
        quoteId: null,
        formData: {
            title: '',
            items: [
                { description: '', price: 0 }
            ],
            payment_terms: '',
            validity_days: 30,
            status: 'draft',
            notes: ''
        },
        total: 0,

        openCreate() {
            this.resetForm();
            this.open = true;
        },

        openEdit(quoteId) {
            this.isEdit = true;
            this.quoteId = quoteId;
            this.loadQuote(quoteId);
            this.open = true;
        },

        closeModal() {
            this.open = false;
            setTimeout(() => this.resetForm(), 300);
        },

        resetForm() {
            this.formData = {
                title: '',
                items: [
                    { description: '', price: 0 }
                ],
                payment_terms: '',
                validity_days: 30,
                status: 'draft',
                notes: ''
            };
            this.total = 0;
            this.isEdit = false;
            this.quoteId = null;
        },

        loadQuote(quoteId) {
            const quote = quotes.find(q => q.id === quoteId);
            if (quote) {
                this.formData = {
                    title: quote.title,
                    items: quote.items.map(item => ({
                        description: item.description,
                        price: parseFloat(item.price)
                    })),
                    payment_terms: quote.payment_terms || '',
                    validity_days: quote.validity_days || 30,
                    status: quote.status,
                    notes: quote.notes || ''
                };
                this.calculateTotal();
            }
        },

        addItem() {
            this.formData.items.push({ description: '', price: 0 });
        },

        removeItem(index) {
            if (this.formData.items.length > 1) {
                this.formData.items.splice(index, 1);
                this.calculateTotal();
            }
        },

        calculateTotal() {
            this.total = this.formData.items.reduce((sum, item) => {
                return sum + (parseFloat(item.price) || 0);
            }, 0);
        }
    };
}