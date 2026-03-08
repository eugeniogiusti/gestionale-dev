/**
 * Project Search Component
 * Global navbar search — queries projects by name and navigates on selection
 */
export default () => ({
    // State
    query: '',
    results: {
        projects: []
    },
    isSearching: false,
    showDropdown: false,

    // Computed
    get hasResults() {
        return this.results.projects.length > 0;
    },

    get isEmpty() {
        return !this.hasResults && this.query.length >= 2 && !this.isSearching;
    },

    // Methods
    async performSearch() {
        if (this.query.length < 2) {
            this.clearResults();
            return;
        }

        this.isSearching = true;

        try {
            const response = await fetch(`/api/search/projects?q=${encodeURIComponent(this.query)}`);
            const data = await response.json();

            this.results = data;
            this.showDropdown = this.hasResults;
        } catch (error) {
            console.error('Project search error:', error);
            this.clearResults();
        } finally {
            this.isSearching = false;
        }
    },

    clearResults() {
        this.results = { projects: [] };
        this.showDropdown = false;
    },

    closeDropdown() {
        this.showDropdown = false;
    },

    openDropdownIfHasResults() {
        if (this.hasResults) {
            this.showDropdown = true;
        }
    },

    navigateToProject(projectId) {
        window.location.href = `/projects/${projectId}`;
    }
});
