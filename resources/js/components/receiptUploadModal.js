/**
 * Receipt Upload Modal Component
 */
export default function receiptUploadModal(projectId) {
    return {
        open: false,
        costId: null,
        uploadUrl: '',
        fileName: '',
        projectId: projectId,

        /**
         * Open upload modal for specific cost
         */
        openUpload(costId) {
            this.costId = costId;
            this.uploadUrl = this.buildUploadUrl(costId);
            this.fileName = '';
            this.open = true;
        },

        /**
         * Close modal and reset state
         */
        close() {
            this.open = false;
            setTimeout(() => {
                this.costId = null;
                this.uploadUrl = '';
                this.fileName = '';
            }, 300);
        },

        /**
         * Handle file selection
         */
        handleFileSelect(event) {
            const file = event.target.files[0];
            if (file) {
                this.fileName = file.name;
            }
        },

        /**
         * Handle form submission
         */
        handleSubmit(event) {
            // Let the form submit naturally
        },

        /**
         * Build upload URL dynamically
         */
        buildUploadUrl(costId) {
            return `/projects/${this.projectId}/costs/${costId}/receipt`;
        }
    };
}