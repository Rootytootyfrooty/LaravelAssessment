@props(['icon', 'class' => ''])
<span 
    aria-hidden="true" 
    {{ $attributes->merge([
        'class' => "overflow-visible text-white [&_svg]:max-w-[30px] $class"
    ]) }}
    >
{!! file_get_contents(public_path('storage/svgs/' . $icon . '.svg')) !!}
</span>