@props(['active' => false])
<a 
    {{ $attributes }} 
    class="transition-colors p-3 pb-4 text-xl rounded-md{{ $active ? ' border border-base-100 bg-base-300' : '' }}"
    aria-current="{{ $active ? 'page' : 'false' }}"
>
    {{ $slot }}
</a>