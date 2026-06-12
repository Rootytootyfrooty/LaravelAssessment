@props(['name', 'label', 'model', 'type', 'accept' => '', 'style' => ''])
<div class="space-y-2 mt-2 w-full {{ $style }}">
    <label  
        for="{{ $name }}" 
        class="label"
    >
        <span aria-hidden="true" class="-mr-1">*</span>{{ $label }}: </label>
    <input 
        name="{{ $name }}" 
        type={{ $type }} 
        id="{{ $name }}" 
        value="{{ old($name, $model->$name) }}"
        {{ $attributes }}">

    @if ($errors->has($name))
        <p class="text-error text-center">{{ $errors->first($name) }}</p>
    @endif
</div>