import './bootstrap'
import Alpine from 'alpinejs'
import createToastStore from './stores/toast'
import projectSearch from './components/projectSearch'
import clientSearch from './components/clientSearch' 

window.Alpine = Alpine

// Stores
Alpine.store('toast', createToastStore())

// Components
Alpine.data('projectSearch', projectSearch);
Alpine.data('clientSearch', clientSearch)

Alpine.start()