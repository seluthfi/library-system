@extends('layouts.app')

@section('title', $title ?? 'Edit Buku')

@section('content')
    <div class="w-full max-w-[640px] mx-auto">
        <div class="mb-space-md flex items-center justify-between gap-space-sm flex-wrap">
            <a href="{{ route('books.index') }}"
               class="group inline-flex items-center gap-space-xs px-space-md py-1.5 rounded-full bg-surface-container-lowest/50 hover:bg-surface-container-lowest/80 backdrop-blur-xl shadow-[0_4px_16px_-2px_rgba(79,107,245,0.08)] transition-all">
                <span class="material-symbols-outlined text-[18px] text-primary transition-transform group-hover:-translate-x-0.5">arrow_back</span>
                <span class="text-label-lg font-semibold text-on-surface-variant group-hover:text-on-surface">Kembali ke Daftar Buku</span>
            </a>
            <div class="inline-flex items-center gap-1.5 px-space-md py-1 rounded-full bg-surface-container-highest/60 backdrop-blur-md shadow-[inset_0_1px_1px_rgba(255,255,255,0.9)]">
                <span class="w-1.5 h-1.5 rounded-full bg-primary"></span>
                <span class="text-label-caps font-bold text-on-surface-variant uppercase tracking-wider">Modul Katalog</span>
            </div>
        </div>

        <x-glass-card class="relative overflow-hidden p-space-md sm:p-space-xl">
            <div class="flex flex-col gap-space-xs mb-space-lg">
                <div class="inline-flex items-center gap-1.5 self-start px-space-md py-1 rounded-full bg-surface-container-lowest/70 backdrop-blur-md shadow-[0_2px_8px_rgba(79,107,245,0.06),inset_0_1px_1px_rgba(255,255,255,0.9)]">
                    <span class="material-symbols-outlined text-[16px] text-primary" style="font-variation-settings: 'FILL' 1;">edit_square</span>
                    <span class="text-label-caps font-bold text-on-surface-variant uppercase tracking-wider">Edit Pustaka</span>
                </div>
                <h1 class="text-headline-lg font-semibold tracking-tight text-on-surface">{{ $title ?? 'Edit Buku' }}</h1>
                <p class="text-body-md text-on-surface-variant">Perbarui informasi buku dalam sistem katalog perpustakaan.</p>
            </div>

            <form action="{{ route('books.update', $book->id) }}" method="POST" class="space-y-space-md">
                @csrf
                @method('PUT')

                <x-input-pill
                    name="title"
                    type="text"
                    label="Judul Buku"
                    placeholder="Judul Buku"
                    :value="$book->title"
                    required
                />

                <x-input-pill
                    name="author"
                    type="text"
                    label="Penulis"
                    placeholder="Penulis"
                    :value="$book->author"
                    required
                />

                <div class="grid grid-cols-1 sm:grid-cols-2 gap-space-md">
                    <x-input-pill
                        name="year"
                        type="number"
                        label="Tahun Terbit"
                        placeholder="Tahun Terbit"
                        :value="$book->year"
                        min="1990"
                        max="{{ date('Y') }}"
                        required
                    />

                    <x-input-pill
                        name="stock"
                        type="number"
                        label="Stok Buku"
                        placeholder="Stok Buku"
                        :value="$book->stock"
                        min="0"
                        max="1000"
                        required
                    />
                </div>

                <x-select-pill name="category_id" label="Kategori Buku" required>
                    <option value="">Pilih Kategori</option>
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}" @selected(old('category_id', $book->category_id) == $category->id)>
                            {{ $category->name }}
                        </option>
                    @endforeach
                </x-select-pill>

                <div class="pt-1 flex items-center justify-between text-on-surface-variant text-body-sm px-1">
                    <span class="flex items-center gap-1">
                        <span class="material-symbols-outlined text-[16px] text-outline">tag</span>
                        ID: #{{ $book->id }}
                    </span>
                    @if ($book->updated_at)
                        <span class="text-outline">Diperbarui: {{ $book->updated_at->format('d M Y') }}</span>
                    @endif
                </div>

                <div class="pt-space-md flex flex-col-reverse sm:flex-row items-center justify-end gap-space-sm sm:gap-space-md">
                    <a href="{{ route('books.index') }}"
                       class="w-full sm:w-auto text-center px-space-lg py-2.5 rounded-full text-label-lg font-semibold text-on-surface-variant hover:text-on-surface hover:bg-surface-container-lowest/60 transition-all">
                        Kembali ke Daftar Buku
                    </a>
                    <x-primary-button class="w-full sm:w-auto px-space-xl">
                        <span class="material-symbols-outlined text-[18px]">save</span>
                        <span>Simpan</span>
                    </x-primary-button>
                </div>
            </form>
        </x-glass-card>
    </div>
@endsection
