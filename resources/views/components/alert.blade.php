@props([
    'type' => 'success',
])

@php
    $styles = match ($type) {
        'error' => 'bg-error-container/80 text-on-error-container border-error/20',
        default => 'bg-secondary-container/70 text-on-secondary-container border-secondary/20',
    };
    $icon = $type === 'error' ? 'error' : 'check_circle';
@endphp

<div {{ $attributes->merge(['class' => "mb-space-lg px-space-lg py-space-md rounded-2xl border backdrop-blur-md shadow-[0_8px_20px_-4px_rgba(27,36,64,0.06)] flex items-start gap-3 {$styles}"]) }}>
    <span class="material-symbols-outlined text-[20px] shrink-0 mt-0.5">{{ $icon }}</span>
    <div class="text-body-md font-medium">
        {{ $slot }}
    </div>
</div>
