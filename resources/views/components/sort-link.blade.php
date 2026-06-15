@props(['active' => false, 'option'])
<a 
    class="btn{{ $active ? ' bg-blue-800' : '' }}" 
    href="{{ request()->fullUrlWithQuery(['sort' => $option]) }}"
    {!! $active ? 'aria-current="true"' : '' !!}
    {{ $attributes }}
    >
    {{ $slot }}
</a>

