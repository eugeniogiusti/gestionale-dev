import './bootstrap'
import './theme'
import Alpine from 'alpinejs'
import createToastStore from './stores/toast'
import projectSearch from './components/projectSearch'
import clientSearch from './components/clientSearch' 
import ClientForm from './components/ClientForm';
import ProjectForm from './components/ProjectForm';
import taskModal from './components/taskModal';
import meetingModal from './components/meetingModal';
import paymentModal from './components/paymentModal';

window.Alpine = Alpine

// Stores
Alpine.store('toast', createToastStore())

// Components
Alpine.data('projectSearch', projectSearch);
Alpine.data('clientSearch', clientSearch);
Alpine.data('clientForm', ClientForm);
Alpine.data('projectForm', ProjectForm);

// Modal components 
window.taskModal = taskModal;
window.meetingModal = meetingModal;
window.paymentModal = paymentModal;

Alpine.start()