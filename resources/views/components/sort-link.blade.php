@props(['active' => false, 'option'])
<a 
    class="btn{{ $active ? ' bg-blue-800' : '' }}" 
    href="?sort={{ $option }}"
    aria-current="{{ $active ? 'page' : 'false' }}"
    {{ $attributes }}
    >
    {{ $slot }}
</a>

