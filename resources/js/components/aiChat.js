export default function aiChat(el) {
    const endpoint = el?.dataset?.aiEndpoint || '';
    const historyEndpoint = el?.dataset?.aiHistoryEndpoint || '';
    const projectName = el?.dataset?.projectName || 'Project';
    const projectId = el?.dataset?.projectId || 'global';
    const errorText = el?.dataset?.errorText || 'Errore';
    const openKey = `ai_chat_open_${projectId}`;

    return {
        open: false,
        messages: [],
        input: '',
        loading: false,
        loadingHistory: false,
        error: null,
        errorCode: null,
        lastUserMessage: null,
        projectName,

        init() {
            const saved = localStorage.getItem(openKey);
            if (saved === '1') {
                this.open = true;
            }
            this.loadHistory();
        },

        toggle() {
            this.open = !this.open;
            localStorage.setItem(openKey, this.open ? '1' : '0');
            if (this.open) {
                this.$nextTick(() => this.scrollToBottom());
            }
        },

        async loadHistory() {
            if (!historyEndpoint) return;
            this.loadingHistory = true;

            try {
                const response = await fetch(historyEndpoint, {
                    headers: {
                        'Accept': 'application/json',
                    },
                });

                if (!response.ok) return;

                const data = await response.json().catch(() => ({}));
                if (Array.isArray(data.messages)) {
                    this.messages = data.messages;
                }
            } catch (err) {
                // ignore history errors
            } finally {
                this.loadingHistory = false;
                this.$nextTick(() => this.scrollToBottom());
            }
        },

        async send() {
            const content = this.input.trim();
            if (!content || this.loading || !endpoint) return;

            await this.sendMessage(content, true);
        },

        async retry() {
            if (!this.lastUserMessage || this.loading) return;
            await this.sendMessage(this.lastUserMessage, false);
        },

        async sendMessage(content, addUserMessage) {
            if (addUserMessage) {
                this.messages.push({ role: 'user', content });
            }
            this.lastUserMessage = content;
            this.input = '';
            this.loading = true;
            this.error = null;
            this.errorCode = null;
            this.$nextTick(() => this.scrollToBottom());

            try {
                const response = await fetch(endpoint, {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': this.csrfToken(),
                    },
                    body: JSON.stringify({ message: content }),
                });

                const data = await response.json().catch(() => ({}));

                if (!response.ok) {
                    this.error = data.message || errorText;
                    this.errorCode = data.code || (response.status === 429 ? 'rate_limited' : null);
                    return;
                }

                if (data.message) {
                    const cleaned = String(data.message).replace(/\*\*/g, '');
                    this.messages.push({ role: 'assistant', content: cleaned });
                } else {
                    this.error = errorText;
                    this.errorCode = 'error';
                }
            } catch (err) {
                this.error = errorText;
                this.errorCode = 'error';
            } finally {
                this.loading = false;
                this.$nextTick(() => this.scrollToBottom());
            }
        },

        csrfToken() {
            const meta = document.querySelector('meta[name="csrf-token"]');
            return meta ? meta.getAttribute('content') : '';
        },

        scrollToBottom() {
            const box = this.$refs.messages;
            if (box) {
                box.scrollTop = box.scrollHeight;
            }
        },
    };
}
