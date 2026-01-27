{{-- Modal Backdrop --}}
<div x-show="open" 
     x-transition
     class="fixed inset-0 bg-gray-500 bg-opacity-75 z-40" 
     @click="close()"></div>