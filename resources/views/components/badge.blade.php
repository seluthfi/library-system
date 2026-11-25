@props([
    'variant' => 'neutral',
])

@php
    $classes = match ($variant) {
        'primary' => 'bg-primary-fixed text-on-primary-fixed',
        'secondary' => 'bg-secondary-container text-on-secondary-container',
        'amber' => 'bg-[#F59E4B]/15 text-[#B45309]',
        'error' => 'bg-error-container text-on-error-container',
        default => 'bg-surface-container-lowest/60 text-on-surface-variant',
    };
@endphp

<span {{ $attributes->merge(['class' => "inline-flex items-center gap-1.5 px-3 py-1 rounded-full text-label-md font-semibold backdrop-blur-sm {$classes}"]) }}>
    {{ $slot }}
</span>
