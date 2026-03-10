/**
 * Tax Attachment Upload Modal Component
 */
export default function taxAttachmentModal() {
    return {
        open: false,
        taxId: null,
        uploadUrl: '',
        fileName: '',

        openUpload(taxId) {
            this.taxId = taxId;
            this.uploadUrl = `/taxes/${taxId}/attachment`;
            this.fileName = '';
            this.open = true;
        },

        close() {
            this.open = false;
            setTimeout(() => {
                this.taxId = null;
                this.uploadUrl = '';
                this.fileName = '';
            }, 300);
        },

        handleFileSelect(event) {
            const file = event.target.files[0];
            if (file) {
                this.fileName = file.name;
            }
        }
    };
}
