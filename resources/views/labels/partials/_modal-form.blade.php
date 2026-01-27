{{-- Modal Form Orchestrator --}}
<div @open-label-modal.window="openCreate()"
     @edit-label.window="openEdit($event.detail)"
     @keydown.escape.window="close()"
     x-cloak>
    
    @include('labels.partials.modal-form._backdrop')
    
    <div x-show="open" 
         x-transition
         class="fixed inset-0 z-50 overflow-y-auto p-4" 
         @click.away="close()">
        
        <div class="mx-auto max-w-md mt-20">
            <div class="bg-white dark:bg-gray-800 rounded-lg shadow-xl" @click.stop>
                
                @include('labels.partials.modal-form._header')
                
                <form method="POST" 
                      :action="isEdit 
                          ? '{{ route('labels.update', '__ID__') }}'.replace('__ID__', labelId) 
                          : '{{ route('labels.store') }}'">
                    @csrf
                    <input type="hidden" name="_method" x-bind:value="isEdit ? 'PUT' : 'POST'">

                    <div class="px-6 py-4 space-y-4">
                        @include('labels.partials.modal-form._field-name')
                        @include('labels.partials.modal-form._field-color')
                    </div>

                    @include('labels.partials.modal-form._footer')
                </form>

            </div>
        </div>
    </div>

</div>