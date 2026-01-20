@props(['label'])

<span 
    class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium"
    style="background-color: {{ $label->color_hex }}20; color: {{ $label->color_hex }}; border: 1px solid {{ $label->color_hex }}40;">
    {{ $label->name }}
</span>