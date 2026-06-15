@props(['active' => false, 'page', 'color'])
@php
$bgClass = match ($color) {
    'bg-primary' => 'bg-primary/70',
    'bg-secondary' => 'bg-secondary/70',
    'bg-accent' => 'bg-accent/70',
};
@endphp
<a 
    class="{{ 'mx-4 btn hidden md:block pt-2 text-primary-content ' . ($active ? $bgClass : $color) }}" {{ $attributes }}
    {!! $active ? 'aria-current="page"' : '' !!}
>
    {{ $slot }}
</a>