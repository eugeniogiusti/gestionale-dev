/**
 * Inline Field Component
 * Allows editing a single text field in-place via PATCH request.
 * Usage: Alpine.data('inlineField', inlineField)
 * x-data="inlineField(patchUrl, fieldName, initialValue, msgSaved, msgError)"
 */
export default function inlineField(patchUrl, fieldName, initialValue, msgSaved, msgError) {
    return {
        editing: false,
        saving: false,
        value: initialValue ?? '',
        draft: '',

        startEdit() {
            this.draft = this.value;
            this.editing = true;
            this.$nextTick(() => this.$refs.textarea?.focus());
        },

        cancel() {
            this.editing = false;
        },

        async save() {
            if (this.saving) return;
            this.saving = true;

            try {
                const response = await fetch(patchUrl, {
                    method: 'PATCH',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
                        'Accept': 'application/json',
                    },
                    body: JSON.stringify({ field: fieldName, value: this.draft }),
                });

                if (!response.ok) throw new Error(response.status);

                this.value = this.draft;
                this.editing = false;
                Alpine.store('toast').add({ title: msgSaved, type: 'success', timeout: 2000 });
            } catch {
                Alpine.store('toast').add({ title: msgError, type: 'error', timeout: 3000 });
            } finally {
                this.saving = false;
            }
        },
    };
}
