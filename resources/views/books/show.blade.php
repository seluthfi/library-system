@extends('layouts.app')

@section('title', $title ?? 'Detail Buku')

@section('content')
    <div class="w-full max-w-[640px] mx-auto flex flex-col">
        <div class="mb-space-md">
            <a href="{{ route('books.index') }}"
               class="inline-flex items-center gap-space-xs px-space-md py-1.5 rounded-full text-label-lg font-semibold text-on-surface-variant hover:text-on-surface bg-surface-container-lowest/40 hover:bg-surface-container-lowest/70 backdrop-blur-md shadow-[0_4px_12px_-2px_rgba(27,36,64,0.03)] transition-all group">
                <span class="material-symbols-outlined text-[18px] transition-transform group-hover:-translate-x-0.5">arrow_back</span>
                <span>Daftar Buku</span>
            </a>
        </div>

        <div class="flex flex-col sm:flex-row sm:items-baseline justify-between gap-space-xs mb-space-lg">
            <div>
                <h1 class="text-headline-lg font-semibold text-on-surface tracking-tight">{{ $title ?? 'Detail Buku' }}</h1>
                <p class="text-body-sm text-on-surface-variant mt-space-xs">Informasi katalog pustaka dan ketersediaan stok fisik</p>
            </div>
            @if ($book)
                <span class="inline-flex items-center px-space-sm py-0.5 rounded-full text-label-caps font-bold uppercase tracking-wider bg-surface-container-lowest/60 text-outline shadow-sm backdrop-blur-sm">
                    Katalog #{{ str_pad($book->id, 3, '0', STR_PAD_LEFT) }}
                </span>
            @endif
        </div>

        <x-glass-card class="relative overflow-hidden flex flex-col">
            @if ($book)
                <div class="flex flex-col">
                    <div class="flex items-center justify-between py-space-md gap-4">
                        <span class="text-label-lg font-semibold text-on-surface-variant">ID</span>
                        <span class="text-label-lg text-on-surface font-semibold tracking-wide">{{ $book->id }}</span>
                    </div>
                    <div class="w-full h-px bg-surface-container-lowest/80"></div>

                    <div class="flex items-center justify-between py-space-md gap-4">
                        <span class="text-label-lg font-semibold text-on-surface-variant">Judul</span>
                        <span class="text-headline-sm text-on-surface font-semibold tracking-tight text-right">{{ $book->title }}</span>
                    </div>
                    <div class="w-full h-px bg-surface-container-lowest/80"></div>

                    <div class="flex items-center justify-between py-space-md gap-4">
                        <span class="text-label-lg font-semibold text-on-surface-variant">Kategori</span>
                        <x-badge :variant="$book->category ? 'secondary' : 'neutral'">
                            {{ $book->category->name ?? 'Belum ada kategori' }}
                        </x-badge>
                    </div>
                    <div class="w-full h-px bg-surface-container-lowest/80"></div>

                    <div class="flex items-center justify-between py-space-md gap-4">
                        <span class="text-label-lg font-semibold text-on-surface-variant">Penulis</span>
                        <span class="text-body-lg text-on-surface text-right">{{ $book->author }}</span>
                    </div>
                    <div class="w-full h-px bg-surface-container-lowest/80"></div>

                    <div class="flex items-center justify-between py-space-md gap-4">
                        <span class="text-label-lg font-semibold text-on-surface-variant">Tahun Terbit</span>
                        <span class="text-body-lg text-on-surface">{{ $book->year }}</span>
                    </div>
                    <div class="w-full h-px bg-surface-container-lowest/80"></div>

                    <div class="flex items-center justify-between py-space-md gap-4">
                        <span class="text-label-lg font-semibold text-on-surface-variant">Stok</span>
                        <div class="inline-flex items-center gap-1.5 px-space-md py-1 rounded-full bg-secondary-fixed/50 backdrop-blur-md shadow-[inset_0_1px_1px_rgba(255,255,255,0.8),0_2px_8px_rgba(0,106,101,0.08)]">
                            <span class="w-2 h-2 rounded-full bg-secondary"></span>
                            <span class="text-label-lg font-semibold text-on-secondary-fixed-variant">{{ $book->stock }}</span>
                            <span class="text-body-sm text-on-secondary-fixed-variant">Eksemplar</span>
                        </div>
                    </div>
                </div>
            @else
                <p class="text-center text-on-surface-variant py-space-lg">Buku tidak ditemukan.</p>
            @endif
        </x-glass-card>
    </div>
@endsection
