@props([
    'title',
    'subtitle' => null,
    'badge' => null,
])

<div {{ $attributes->merge(['class' => 'relative mb-space-xl flex flex-col sm:flex-row sm:items-end sm:justify-between gap-space-md']) }}>
    <div class="flex flex-col items-start gap-space-xs">
        @if ($badge)
            <div class="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-surface-container-lowest/50 backdrop-blur-md shadow-[inset_0_1px_1px_rgba(255,255,255,0.9)] mb-1">
                <span class="w-2 h-2 rounded-full bg-primary"></span>
                <span class="text-label-caps font-bold text-on-surface-variant uppercase tracking-wider">{{ $badge }}</span>
            </div>
        @endif
        <h1 class="text-headline-lg sm:text-display-lg font-bold tracking-tight text-[#1B2440]">
            {{ $title }}
        </h1>
        @if ($subtitle)
            <p class="text-body-lg text-[#5B6788] max-w-xl">
                {{ $subtitle }}
            </p>
        @endif
    </div>

    @if (isset($actions))
        <div class="flex items-center gap-space-sm shrink-0">
            {{ $actions }}
        </div>
    @endif
</div>
