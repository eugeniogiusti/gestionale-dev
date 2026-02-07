/**
 * Document Modal Component
 * Handles upload/edit modal for documents in project context
 */
export default function documentModal() {
    return {
        open: false,
        isEdit: false,
        documentId: null,
        fileName: '',
        formData: {},

        init() {
            this.formData = this.getEmptyForm();
        },

        getEmptyForm() {
            return {
                name: '',
                label_ids: [],
                notes: ''
            };
        },

        /**
         * Reset form data to defaults
         */
        resetForm() {
            this.formData = this.getEmptyForm();
            this.fileName = '';
            this.isEdit = false;
            this.documentId = null;
        },

        /**
         * Open modal for creating new document
         */
        openCreate() {
            this.resetForm();
            this.open = true;
        },

        /**
         * Open modal for editing existing document
         */
        openEdit(documentData) {
            this.isEdit = true;
            this.documentId = documentData.id;
            this.formData = {
                name: documentData.name || '',
                label_ids: documentData.label_ids || [],
                notes: documentData.notes || ''
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
         * Handle file selection
         */
        handleFileSelect(event) {
            const file = event.target.files[0];
            if (file) {
                this.fileName = file.name;

                // Auto-fill name if empty
                if (!this.formData.name) {
                    // Remove extension from filename
                    this.formData.name = file.name.replace(/\.[^/.]+$/, '');
                }
            }
        }
    };
}