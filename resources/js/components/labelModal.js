export default function labelModal(labels = []) {
    return {
        open: false,
        isEdit: false,
        labelId: null,
        formData: {},

        init() {
            this.formData = this.getEmptyForm();
        },

        getEmptyForm() {
            return {
                name: '',
                color: 'blue'
            };
        },

        openCreate() {
            this.resetForm();
            this.open = true;
        },

        openEdit(labelId) {
            this.isEdit = true;
            this.labelId = labelId;
            this.loadLabel(labelId);
            this.open = true;
        },

        close() {
            this.open = false;
            setTimeout(() => this.resetForm(), 300);
        },

        resetForm() {
            this.formData = this.getEmptyForm();
            this.isEdit = false;
            this.labelId = null;
        },

        loadLabel(labelId) {
            const label = labels.find(l => l.id === labelId);
            if (label) {
                this.formData = {
                    name: label.name,
                    color: label.color
                };
            }
        }
    };
}