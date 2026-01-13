import './bootstrap'
import './theme'
import Alpine from 'alpinejs'
import createToastStore from './stores/toast'
import projectSearch from './components/projectSearch'
import clientSearch from './components/clientSearch' 
import ClientForm from './components/ClientForm';
import ProjectForm from './components/ProjectForm';


window.Alpine = Alpine

// Stores
Alpine.store('toast', createToastStore())

// Components
Alpine.data('projectSearch', projectSearch);
Alpine.data('clientSearch', clientSearch)
Alpine.data('clientForm', ClientForm);
Alpine.data('projectForm', ProjectForm);

Alpine.start()