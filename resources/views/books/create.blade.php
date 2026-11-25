@extends('layouts.app')

@section('title', 'Tambah Buku Baru')

@section('content')
    <div class="w-full max-w-[640px] mx-auto">
        <div class="flex items-center justify-between mb-space-lg">
            <a href="{{ route('books.index') }}"
               class="group inline-flex items-center gap-2 px-space-md py-1.5 rounded-full bg-surface-container-lowest/50 hover:bg-surface-container-lowest/80 backdrop-blur-xl text-on-surface shadow-[0_4px_16px_rgba(79,107,245,0.06)] transition-all">
                <span class="material-symbols-outlined text-[18px] text-primary group-hover:-translate-x-0.5 transition-transform">arrow_back</span>
                <span class="text-label-lg font-semibold text-on-surface">Kembali ke Daftar Buku</span>
            </a>
            <div class="flex items-center gap-2">
                <span class="w-2 h-2 rounded-full bg-primary-container"></span>
                <span class="text-label-caps font-bold tracking-widest text-outline uppercase">Modul Katalog</span>
            </div>
        </div>

        <x-glass-card class="relative overflow-hidden p-8 sm:p-10">
            <div class="mb-space-lg">
                <div class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full bg-surface-container-highest/60 backdrop-blur-md mb-3">
                    <span class="material-symbols-outlined text-[15px] text-primary" style="font-variation-settings: 'FILL' 1;">add_circle</span>
                    <span class="text-label-caps font-bold tracking-wider text-primary uppercase">Entri Pustaka</span>
                </div>
                <h1 class="text-headline-lg font-semibold tracking-tight text-on-surface">Tambah Buku Baru</h1>
                <p class="text-body-md text-on-surface-variant mt-1">Lengkapi rincian metadata bibliografi untuk mendaftarkan buku ke sistem.</p>
            </div>

            <form action="{{ route('books.store') }}" method="POST" class="flex flex-col gap-5">
                @csrf

                <x-input-pill
                    name="title"
                    type="text"
                    label="Judul Buku"
                    placeholder="Judul Buku"
                    required
                />

                <x-input-pill
                    name="author"
                    type="text"
                    label="Penulis"
                    placeholder="Penulis"
                    required
                />

                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                    <x-input-pill
                        name="year"
                        type="number"
                        label="Tahun Terbit"
                        placeholder="Tahun Terbit"
                        min="1990"
                        max="{{ date('Y') }}"
                        required
                    />

                    <x-input-pill
                        name="stock"
                        type="number"
                        label="Stok Buku"
                        placeholder="Stok Buku"
                        min="0"
                        max="1000"
                        required
                    />
                </div>

                <x-select-pill name="category_id" label="Kategori Buku" required>
                    <option value="">Pilih Kategori</option>
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}" @selected(old('category_id') == $category->id)>
                            {{ $category->name }}
                        </option>
                    @endforeach
                </x-select-pill>

                <div class="pt-4 mt-2 flex flex-col-reverse sm:flex-row items-center justify-end gap-3">
                    <a href="{{ route('books.index') }}"
                       class="w-full sm:w-auto px-6 py-3 rounded-full bg-surface-container-lowest/45 hover:bg-surface-container-lowest/80 backdrop-blur-xl text-label-lg font-semibold text-on-surface text-center shadow-[inset_0_1px_1px_rgba(255,255,255,0.9),0_4px_12px_rgba(27,36,64,0.03)] transition-all duration-200">
                        Kembali ke Daftar Buku
                    </a>
                    <x-primary-button class="w-full sm:w-auto px-8">
                        <span class="material-symbols-outlined text-[20px]">save</span>
                        <span>Simpan</span>
                    </x-primary-button>
                </div>
            </form>
        </x-glass-card>
    </div>
@endsection
