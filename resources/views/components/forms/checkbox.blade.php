@props(['label', 'name', 'value' => 1, 'checked' => false])

@php
    $defaults = [
        'type' => 'checkbox',
        'id' => $name,
        'name' => $name,
        'value' => $value,
    ];

    // Ha hibás form után jön vissza az érték
    if (old($name) !== null) {
        $checked = old($name) == $value;
    }
@endphp

<x-forms.field :label="$label" :name="$name">
    <div class="rounded-xl bg-white/10 border border-black/25 px-5 py-4 w-full flex items-center">
        <input {{ $attributes->merge($defaults) }} {{ $checked ? 'checked' : '' }}>
        <span class="pl-1">{{ $label }}</span>
    </div>
</x-forms.field>