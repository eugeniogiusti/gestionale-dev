// resources/js/components/ProjectForm.js

export default function () {
    return {
        activeTab: 'info',
        errors: JSON.parse(this.$el.getAttribute('data-errors') || '{}'),
        
        init() {
            this.activateTabWithErrors();
        },
        
        hasErrors(tab) {
            const tabFields = {
                'info': [
                    'name', 
                    'client_id', 
                    'type',
                    'description', 
                    'status', 
                    'priority',
                    'start_date',
                    'due_date'
                ],
                'links': ['repo_url', 'staging_url', 'production_url', 'figma_url', 'docs_url'],
                'notes': ['notes']
            };
            return tabFields[tab]?.some(field => this.errors[field]);
        },
        
        activateTabWithErrors() {
            const tabs = ['info', 'links', 'notes'];
            for (const tab of tabs) {
                if (this.hasErrors(tab)) {
                    this.activeTab = tab;
                    break;
                }
            }
        }
    };
}