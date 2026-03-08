/**
 * Label Modal Component
 * Handles create/edit modal for labels (global)
 */
export default function labelModal() {
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

        /** Open modal for creating new label */
        openCreate() {
            this.resetForm();
            this.open = true;
        },

        /** Open modal for editing existing label */
        openEdit(labelData) {
            this.isEdit = true;
            this.labelId = labelData.id;
            this.formData = {
                name: labelData.name || '',
                color: labelData.color || 'blue'
            };
            this.open = true;
        },

        /** Close modal and reset form after animation */
        close() {
            this.open = false;
            setTimeout(() => this.resetForm(), 300);
        },

        resetForm() {
            this.formData = this.getEmptyForm();
            this.isEdit = false;
            this.labelId = null;
        }
    };
}
