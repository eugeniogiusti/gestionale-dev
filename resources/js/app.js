import './bootstrap'
import Alpine from 'alpinejs'
import createToastStore from './stores/toast'

window.Alpine = Alpine
Alpine.store('toast', createToastStore())

Alpine.start()