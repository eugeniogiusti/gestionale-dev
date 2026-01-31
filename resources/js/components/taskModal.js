export default function taskModal() {
    return {
        open: false,
        isEdit: false,
        taskId: null,
        formData: {},

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
                due_date: ''
            };
        },

        resetForm() {
            this.formData = this.getEmptyForm();
            this.isEdit = false;
            this.taskId = null;
        },
        
        openCreate() {
            this.resetForm();
            this.open = true;
        },
        
        openEdit(taskData) {
            this.isEdit = true;
            this.taskId = taskData.id;
            this.formData = {
                title: taskData.title,
                description: taskData.description || '',
                type: taskData.type,
                status: taskData.status,
                priority: taskData.priority || '',
                due_date: taskData.due_date || ''
            };
            this.open = true;
        },
        
        closeModal() {
            this.open = false;
            this.resetForm();
        }
    }
}