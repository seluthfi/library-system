@extends('layouts.app')

@section('title', $title ?? 'Daftar Kategori')

@section('content')
    @php
        $iconMap = [
            'Pemrograman' => ['icon' => 'terminal', 'color' => 'text-primary'],
            'Basis Data' => ['icon' => 'database', 'color' => 'text-tertiary'],
            'Jaringan Komputer' => ['icon' => 'language', 'color' => 'text-secondary'],
            'Sistem Informasi' => ['icon' => 'layers', 'color' => 'text-primary'],
            'Algoritma' => ['icon' => 'account_tree', 'color' => 'text-tertiary'],
        ];
    @endphp

    <div class="flex flex-col w-full">
        <div class="mb-space-xl">
            <h1 class="text-headline-lg font-bold text-on-surface tracking-tight">{{ $title ?? 'Daftar Kategori' }}</h1>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-gutter">
            @forelse ($categories as $category)
                @php
                    $meta = $iconMap[$category->name] ?? ['icon' => 'category', 'color' => 'text-primary'];
                @endphp
                <div class="w-full rounded-lg bg-surface-container-lowest/40 backdrop-blur-2xl p-space-lg sm:p-space-xl shadow-[0_12px_32px_-4px_rgba(79,107,245,0.08),0_4px_12px_-2px_rgba(27,36,64,0.03),inset_0_1px_1px_0_rgba(255,255,255,0.9)] flex flex-col justify-between gap-space-lg transition-all duration-300 hover:bg-surface-container-lowest/55 hover:shadow-[0_20px_48px_-6px_rgba(79,107,245,0.16),0_8px_20px_-4px_rgba(27,36,64,0.05),inset_0_1px_1px_0_rgba(255,255,255,0.9)] hover:-translate-y-1">
                    <div class="w-14 h-14 rounded-DEFAULT bg-surface-container-lowest/60 backdrop-blur-md shadow-[inset_0_1px_1px_0_rgba(255,255,255,0.9),0_4px_12px_rgba(79,107,245,0.08)] flex items-center justify-center {{ $meta['color'] }}">
                        <span class="material-symbols-outlined text-[28px]">{{ $meta['icon'] }}</span>
                    </div>
                    <div class="flex items-center justify-between gap-space-sm min-w-0">
                        <h2 class="text-headline-sm font-semibold text-on-surface truncate">{{ $category->name }}</h2>
                        <span class="shrink-0 h-7 px-space-md rounded-full bg-surface-container-lowest/50 backdrop-blur-md shadow-[inset_0_1px_1px_0_rgba(255,255,255,0.8)] text-label-md font-semibold text-on-surface-variant flex items-center">
                            {{ $category->books_count }} buku
                        </span>
                    </div>
                </div>
            @empty
                <x-glass-card class="md:col-span-2 lg:col-span-3 text-center text-on-surface-variant">
                    Belum ada kategori buku.
                </x-glass-card>
            @endforelse
        </div>
    </div>
@endsection
