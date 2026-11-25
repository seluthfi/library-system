@extends('layouts.app')

@section('title', $title ?? 'Daftar Buku')

@section('content')
    <div class="flex flex-col gap-space-lg w-full">
        @if (session('success'))
            <x-alert type="success">
                {{ session('success') }}
            </x-alert>
        @endif

        <div class="flex flex-col sm:flex-row items-start sm:items-center justify-between gap-space-md pt-space-xs">
            <div class="flex flex-col gap-0.5">
                <div class="flex items-center gap-space-xs">
                    <span class="text-label-caps uppercase text-primary tracking-widest font-semibold">Koleksi Pustaka</span>
                    <span class="w-1.5 h-1.5 rounded-full bg-primary/40"></span>
                    <span class="text-label-caps uppercase text-on-surface-variant/70 font-semibold">{{ $books->count() }} Dokumen</span>
                </div>
                <h1 class="text-headline-lg font-bold tracking-tight text-on-surface">
                    {{ $title ?? 'Daftar Buku' }}
                </h1>
            </div>

            <a href="{{ route('books.create') }}"
               class="relative group overflow-hidden px-space-lg py-3 rounded-full bg-gradient-to-r from-primary to-tertiary text-on-primary text-label-lg font-semibold shadow-[0_12px_28px_-4px_rgba(79,107,245,0.42),inset_0_1px_1px_rgba(255,255,255,0.45)] hover:shadow-[0_16px_36px_-2px_rgba(79,107,245,0.52)] active:scale-[0.98] transition-all flex items-center gap-2 shrink-0">
                <span class="w-5 h-5 rounded-full bg-surface-container-lowest/25 flex items-center justify-center">
                    <span class="material-symbols-outlined text-[16px] text-on-primary">add</span>
                </span>
                <span class="tracking-wide">Tambah Buku Baru</span>
            </a>
        </div>

        <div class="relative rounded-lg bg-surface-container-lowest/45 backdrop-blur-3xl shadow-[0_20px_52px_-8px_rgba(79,107,245,0.12),0_4px_16px_-2px_rgba(17,26,54,0.04)] overflow-hidden">
            <div class="pointer-events-none absolute inset-x-0 top-0 h-px bg-gradient-to-r from-transparent via-white/80 to-transparent"></div>
            <div class="pointer-events-none absolute inset-x-0 bottom-0 h-px bg-gradient-to-r from-transparent via-primary/10 to-transparent"></div>

            <div class="flex flex-col divide-y divide-white/50">
                @forelse ($books as $book)
                    <div class="group px-space-md sm:px-space-xl py-space-lg flex flex-col md:flex-row md:items-center justify-between gap-space-md hover:bg-surface-container-lowest/50 transition-all duration-200">
                        <div class="flex flex-col gap-1.5 min-w-0">
                            <div class="flex flex-wrap items-center gap-space-sm">
                                <span class="text-headline-sm text-on-surface font-semibold tracking-tight group-hover:text-primary transition-colors">
                                    {{ $book->title }}
                                </span>
                                <x-badge :variant="$book->category ? 'secondary' : 'neutral'">
                                    {{ $book->category->name ?? 'Belum ada kategori' }}
                                </x-badge>
                            </div>
                            <div class="flex flex-wrap items-center gap-space-xs text-body-md text-on-surface-variant">
                                <span>{{ $book->author }}</span>
                                <span class="text-outline-variant font-bold">·</span>
                                <span>{{ $book->year }}</span>
                                <span class="text-outline-variant font-bold">·</span>
                                <span class="inline-flex items-center font-semibold text-on-surface">Stok: {{ $book->stock }}</span>
                            </div>
                        </div>

                        <div class="flex flex-wrap items-center gap-2 shrink-0">
                            <a href="{{ route('books.show', $book->id) }}"
                               class="px-space-md py-1.5 rounded-full text-label-md font-semibold text-on-surface bg-surface-container-lowest/60 hover:bg-surface-container-lowest/90 backdrop-blur-md shadow-[0_2px_8px_rgba(27,36,64,0.04),inset_0_1px_1px_rgba(255,255,255,0.85)] hover:text-primary transition-all">
                                Detail Buku
                            </a>
                            <a href="{{ route('books.edit', $book->id) }}"
                               class="px-space-md py-1.5 rounded-full text-label-md font-semibold text-on-surface bg-surface-container-lowest/60 hover:bg-surface-container-lowest/90 backdrop-blur-md shadow-[0_2px_8px_rgba(27,36,64,0.04),inset_0_1px_1px_rgba(255,255,255,0.85)] hover:text-primary transition-all">
                                Edit Buku
                            </a>
                            <form action="{{ route('books.destroy', $book->id) }}" method="POST"
                                  onsubmit="return confirm('Apakah Anda yakin ingin menghapus buku ini?');"
                                  class="inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit"
                                        class="px-space-md py-1.5 rounded-full text-label-md font-semibold text-error bg-error-container/40 hover:bg-error-container/70 backdrop-blur-md shadow-[0_2px_8px_rgba(186,26,26,0.06),inset_0_1px_1px_rgba(255,255,255,0.7)] transition-all cursor-pointer">
                                    Hapus Buku
                                </button>
                            </form>
                        </div>
                    </div>
                @empty
                    <div class="px-space-xl py-space-xl text-center text-on-surface-variant">
                        Belum ada data buku.
                    </div>
                @endforelse
            </div>
        </div>
    </div>
@endsection
