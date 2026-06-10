@props(['active' => false, 'page', 'style' => '', 'color'])
<a 
    class="{{ "text-{$color}-content " . $style . ($active ? " bg-{$color}/50" : " bg-{$color}") }}") {{ $attributes }}
    aria-current="{{ $active ? 'page' : 'false' }}"
>
    {{ $slot }}
</a>