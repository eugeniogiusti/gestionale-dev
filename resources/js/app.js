import './bootstrap'
import './theme'
import Alpine from 'alpinejs'
import createToastStore from './stores/toast'
import projectSearch from './components/projectSearch'
import clientSearch from './components/clientSearch'
import clientModal from './components/clientModal';
import projectModal from './components/projectModal';
import taskModal from './components/taskModal';
import meetingModal from './components/meetingModal';
import paymentModal from './components/paymentModal';
import uploadInvoiceModal from './components/uploadInvoiceModal';
import costModal from './components/costModal';
import receiptUploadModal from './components/receiptUploadModal';
import documentModal from './components/documentModal';
import labelModal from './components/labelModal';
import annualTrendChart from './components/annualTrendChart';
import taskToggle from './components/taskToggle';

window.Alpine = Alpine

// Stores
Alpine.store('toast', createToastStore())

// Components
Alpine.data('projectSearch', projectSearch);
Alpine.data('clientSearch', clientSearch);
Alpine.data('labelModal', labelModal);
Alpine.data('annualTrendChart', annualTrendChart);
Alpine.data('taskToggle', taskToggle);

// Modal components
window.clientModal = clientModal;
window.projectModal = projectModal;
window.taskModal = taskModal;
window.meetingModal = meetingModal;
window.paymentModal = paymentModal;
window.uploadInvoiceModal = uploadInvoiceModal;
window.costModal = costModal;
window.receiptUploadModal = receiptUploadModal;
window.documentModal = documentModal;

Alpine.start()