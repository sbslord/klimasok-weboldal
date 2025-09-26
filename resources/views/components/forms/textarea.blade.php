@props(['label', 'name', 'value' => ''])

@php
    $defaults = [
        'id' => $name,
        'name' => $name,
        'class' => 'rounded-xl bg-white/10 border border-black/25 px-5 py-4 w-full',
    ];
@endphp

<x-forms.field :label="$label" :name="$name">
    <textarea {{ $attributes->merge($defaults) }}>{{ old($name, $value) }}</textarea>
</x-forms.field>