@props(['name', 'linkStart' => '', 'hrefValue' => '', 'iconShow', 'iconHidden', 'color', 'spanValue', 'showStyle' => '', 'hiddenStyle' => ''])

<div class="bg-black/20 rounded-md p-5 w-full flex flex-col md:flex-row items-center gap-2 justify-between">
    <strong>{{ $name }}: </strong>
    <a 
        href="{{ $linkStart . $hrefValue }}" 
        class="max-w-full min-w-0 focus:[&_.let-close]:hidden focus:[&_.let-open]:inline hover:[&_.let-close]:hidden hover:[&_.let-open]:inline flex flex-row items-center pt-1 [&_.trunc]:truncate"
        {{ $attributes }}
    >

        <x-icon :icon="$iconShow" :class="'[&_svg]:max-h-[25px] let-close ' . $color . ' ' . $showStyle "/>
        <x-icon :icon="$iconHidden" :class="'[&_svg]:max-h-[25px] hidden let-open  ' . $color . ' ' . $hiddenStyle "/> 
        <span class="pl-1 pb-1 md:order-first md:pr-3 md:pl-0 min-w-0 trunc">{{ $spanValue }}</span>
    </a>
</div>