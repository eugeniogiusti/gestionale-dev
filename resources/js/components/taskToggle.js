let taskToggleAudioContext = null;

async function playToggleSound() {
    try {
        const AudioContextClass = window.AudioContext || window.webkitAudioContext;
        if (!AudioContextClass) return;

        if (!taskToggleAudioContext) {
            taskToggleAudioContext = new AudioContextClass();
        }

        if (taskToggleAudioContext.state === 'suspended') {
            await taskToggleAudioContext.resume();
        }

        const now = taskToggleAudioContext.currentTime;
        const gain = taskToggleAudioContext.createGain();
        gain.gain.setValueAtTime(0.0001, now);
        gain.gain.exponentialRampToValueAtTime(0.22, now + 0.008);
        gain.gain.exponentialRampToValueAtTime(0.0001, now + 0.45);
        gain.connect(taskToggleAudioContext.destination);

        const osc1 = taskToggleAudioContext.createOscillator();
        osc1.type = 'sine';
        osc1.frequency.setValueAtTime(988, now);
        osc1.connect(gain);
        osc1.start(now);
        osc1.stop(now + 0.45);

        const osc2 = taskToggleAudioContext.createOscillator();
        osc2.type = 'triangle';
        osc2.frequency.setValueAtTime(1318, now);
        osc2.connect(gain);
        osc2.start(now + 0.004);
        osc2.stop(now + 0.4);

        const osc3 = taskToggleAudioContext.createOscillator();
        osc3.type = 'sine';
        osc3.frequency.setValueAtTime(1976, now);
        osc3.connect(gain);
        osc3.start(now + 0.006);
        osc3.stop(now + 0.32);
    } catch (error) {
        // Audio is best-effort; ignore failures.
    }
}

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
            playToggleSound();

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
