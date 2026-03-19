<x-app-layout>
    <iframe 
        src="{{ env('GOOGLE_CALENDAR_EMBED_URL') }}" 
        style="width: 100%; height: calc(100vh - 130px); border: none;"
        frameborder="0" 
        scrolling="no"
    ></iframe>
</x-app-layout>