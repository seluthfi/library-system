@props([
    'type' => 'submit',
])

<button type="{{ $type }}" {{ $attributes->merge(['class' => 'inline-flex items-center justify-center gap-2 px-space-lg py-3 rounded-full bg-gradient-to-r from-primary to-tertiary text-on-primary text-label-lg font-semibold shadow-[0_10px_24px_-4px_rgba(79,107,245,0.4)] hover:shadow-[0_14px_28px_-4px_rgba(79,107,245,0.5)] hover:-translate-y-0.5 transition-all cursor-pointer']) }}>
    {{ $slot }}
</button>
