export default function projectModal() {
    return {
        open: false,
        isEdit: false,
        projectId: null,
        activeTab: 'info',
        formData: {
            // Info
            name: '',
            client_id: '',
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
        },
        
        resetForm() {
            this.formData = {
                name: '',
                client_id: '',
                type: 'client_work',
                description: '',
                status: 'draft',
                priority: '',
                start_date: '',
                due_date: '',
                repo_url: '',
                staging_url: '',
                production_url: '',
                figma_url: '',
                docs_url: '',
                notes: ''
            };
            this.isEdit = false;
            this.projectId = null;
            this.activeTab = 'info';
        },
        
        openCreate() {
            this.resetForm();
            this.open = true;
        },
        
        openEdit(projectData) {
            this.isEdit = true;
            this.projectId = projectData.id;
            this.formData = { ...projectData };
            this.open = true;
        },
        
        closeModal() {
            this.open = false;
            this.resetForm();
        }
    }
}