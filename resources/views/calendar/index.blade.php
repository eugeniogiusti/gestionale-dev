<x-app-layout>
    <iframe 
        src="{{ config('services.google.calendar_embed_url') }}"
        style="width: 100%; height: calc(100vh - 130px); border: none;"
        frameborder="0" 
        scrolling="no"
    ></iframe>
</x-app-layout>