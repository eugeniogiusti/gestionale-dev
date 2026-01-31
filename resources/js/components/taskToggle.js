export default function taskToggle(taskId, projectId, initialStatus) {
    return {
        isDone: initialStatus === 'done',
        currentStatus: initialStatus,
        loading: false,

        async toggle() {
            if (this.loading) return;

            this.loading = true;
            const previousStatus = this.currentStatus;
            const previousIsDone = this.isDone;

            // Optimistic update
            this.isDone = !this.isDone;
            this.currentStatus = this.isDone ? 'done' : 'todo';

            try {
                const response = await fetch(`/projects/${projectId}/tasks/${taskId}/toggle-done`, {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
                        'Accept': 'application/json',
                    },
                });

                if (!response.ok) {
                    throw new Error('Failed to update task status');
                }

                const data = await response.json();
                this.isDone = data.isDone;
                this.currentStatus = data.status;

            } catch (error) {
                // Rollback on error
                this.isDone = previousIsDone;
                this.currentStatus = previousStatus;
                console.error('Error toggling task:', error);
            } finally {
                this.loading = false;
            }
        }
    }
}
