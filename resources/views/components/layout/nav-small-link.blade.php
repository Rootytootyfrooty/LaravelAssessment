@props(['active' => false])
<a 
    {{ $attributes }} 
    class="transition-colors p-3 pb-4 text-xl rounded-sm{{ $active ? ' border bg-base-300' : '' }}"
    aria-current="{{ $active ? 'page' : 'false' }}"
>
    {{ $slot }}
</a>