<div x-data
     x-init="$store.toast.init && $store.toast.init()"
     class="fixed top-4 right-4 z-50 space-y-2"
     aria-live="polite">

  <template x-for="t in $store.toast.toasts" :key="t.id">
    <div class="rounded-md shadow px-4 py-3"
         :class="{
           'bg-green-600 text-white': t.type === 'success',
           'bg-red-600 text-white': t.type === 'error',
           'bg-blue-600 text-white': t.type === 'info',
           'bg-gray-800 text-white': !['success','error','info'].includes(t.type)
         }">
      <div class="flex items-start gap-3">
        <div class="font-semibold" x-text="t.title"></div>
        <button class="ms-auto opacity-80 hover:opacity-100"
                @click="$store.toast.remove(t.id)">✕</button>
      </div>
      <div class="text-sm mt-1" x-text="t.message"></div>
    </div>
  </template>
</div>