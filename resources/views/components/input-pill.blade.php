@props([
    'label' => null,
    'name',
    'type' => 'text',
    'value' => null,
])

<div class="flex flex-col gap-1.5">
    @if ($label)
        <label for="{{ $name }}" class="text-label-lg font-semibold text-on-surface">
            {{ $label }}
        </label>
    @endif
    <input
        id="{{ $name }}"
        name="{{ $name }}"
        type="{{ $type }}"
        value="{{ old($name, $value) }}"
        {{ $attributes->merge(['class' => 'w-full px-space-lg py-3 rounded-full bg-surface-container-lowest/70 backdrop-blur-md border border-outline-variant/60 text-on-surface placeholder:text-outline focus:outline-none focus:ring-2 focus:ring-primary/40 focus:border-primary transition-all']) }}
    >
    @error($name)
        <p class="text-body-sm font-medium text-error px-2">{{ $message }}</p>
    @enderror
</div>
