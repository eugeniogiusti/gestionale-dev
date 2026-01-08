// resources/js/stores/toast.js
export default function toastStore() {
  return {
    toasts: [],
    add({ title = 'OK', message = '', type = 'success', timeout = 2000 } = {}) {
      const id = Date.now() + Math.random()
      this.toasts.push({ id, title, message, type })
      setTimeout(() => this.remove(id), timeout)
    },
    remove(id) {
      this.toasts = this.toasts.filter(t => t.id !== id)
    },
    
    init() { /* no-op */ }
  }
}