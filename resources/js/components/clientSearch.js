export default (initialClientId = null, initialClientName = null) => ({
    // State
    isInternal: !initialClientId,
    searchQuery: initialClientName || '',
    searchResults: [],
    selectedClient: initialClientId ? { id: initialClientId, name: initialClientName } : null,
    isSearching: false,
    showDropdown: false,

    // Sync state when project modal opens for edit
    syncFromProject(clientId, clientName) {
        this.isInternal = !clientId;
        this.searchQuery = clientName || '';
        this.selectedClient = clientId ? { id: clientId, name: clientName } : null;
        this.searchResults = [];
        this.showDropdown = false;
    },

    // Reset state when modal closes or creates new project
    reset() {
        this.isInternal = false;
        this.searchQuery = '';
        this.selectedClient = null;
        this.searchResults = [];
        this.showDropdown = false;
    },

    // Methods
    async searchClients() {
        if (this.searchQuery.length < 2) {
            this.searchResults = [];
            this.showDropdown = false;
            return;
        }

        this.isSearching = true;

        try {
            const response = await fetch(`/api/clients/search?q=${encodeURIComponent(this.searchQuery)}`);
            this.searchResults = await response.json();
            this.showDropdown = this.searchResults.length > 0;
        } catch (error) {
            console.error('Error searching clients:', error);
        } finally {
            this.isSearching = false;
        }
    },

    selectClient(client) {
        this.selectedClient = client;
        this.searchQuery = client.name;
        this.showDropdown = false;
    },

    clearClient() {
        this.selectedClient = null;
        this.searchQuery = '';
        this.searchResults = [];
    },

    toggleInternal() {
        if (this.isInternal) {
            this.clearClient();
        }
    }
});