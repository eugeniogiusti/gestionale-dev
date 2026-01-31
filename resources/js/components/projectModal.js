export default function projectModal() {
    return {
        open: false,
        isEdit: false,
        projectId: null,
        activeTab: 'info',
        backTo: '',
        formData: {},

        init() {
            this.formData = this.getEmptyForm();
        },

        getEmptyForm() {
            return {
                // Info
                name: '',
                client_id: '',
                client_name: '',
                type: 'client_work',
                description: '',
                status: 'draft',
                priority: '',
                start_date: '',
                due_date: '',
                // Links
                repo_url: '',
                staging_url: '',
                production_url: '',
                figma_url: '',
                docs_url: '',
                // Notes
                notes: ''
            };
        },

        resetForm() {
            this.formData = this.getEmptyForm();
            this.isEdit = false;
            this.projectId = null;
            this.activeTab = 'info';
            this.backTo = '';
        },

        openCreate() {
            this.resetForm();
            this.open = true;
        },

        openEdit(projectData) {
            this.isEdit = true;
            this.projectId = projectData.id;
            this.backTo = projectData._back || '';
            this.formData = { ...projectData };

            // Format dates for input[type="date"] (expects YYYY-MM-DD)
            if (this.formData.start_date) {
                this.formData.start_date = this.formatDateForInput(this.formData.start_date);
            }
            if (this.formData.due_date) {
                this.formData.due_date = this.formatDateForInput(this.formData.due_date);
            }

            this.open = true;
        },

        formatDateForInput(dateString) {
            if (!dateString) return '';
            const date = new Date(dateString);
            return date.toISOString().split('T')[0];
        },

        closeModal() {
            this.open = false;
            this.resetForm();
        }
    }
}
