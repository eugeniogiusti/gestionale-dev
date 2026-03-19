/**
 * Task Modal Component
 * Handles create/edit modal for tasks in project context
 */
export default function taskModal() {
    return {
        open: false,
        isEdit: false,
        taskId: null,
        formData: {},
        fileName: '',
        documentName: '',

        init() {
            this.formData = this.getEmptyForm();
        },

        getEmptyForm() {
            return {
                title: '',
                description: '',
                type: 'feature',
                status: 'todo',
                priority: '',
                due_date: '',
                documents: [],
            };
        },

        resetForm() {
            this.formData = this.getEmptyForm();
            this.isEdit = false;
            this.taskId = null;
            this.fileName = '';
            this.documentName = '';
        },

        /** Open modal for creating new task */
        openCreate() {
            this.resetForm();
            this.open = true;
        },

        /** Open modal for editing existing task */
        openEdit(taskData) {
            this.isEdit = true;
            this.taskId = taskData.id;
            this.formData = {
                title: taskData.title,
                description: taskData.description || '',
                type: taskData.type,
                status: taskData.status,
                priority: taskData.priority || '',
                due_date: taskData.due_date || '',
                documents: taskData.documents || [],
            };
            this.fileName = '';
            this.documentName = '';
            this.open = true;
        },

        /** Handle file selection: auto-populates document name from filename */
        handleFileSelect(event) {
            const file = event.target.files[0];
            if (file) {
                this.fileName = file.name;
                // Auto-populate name without extension
                this.documentName = file.name.replace(/\.[^/.]+$/, '');
            } else {
                this.fileName = '';
                this.documentName = '';
            }
        },

        /** Close modal and reset form */
        closeModal() {
            this.open = false;
            this.resetForm();
        }
    }
}
