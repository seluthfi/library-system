@extends('layouts.app')

@section('title', 'Dashboard - ' . $title)

@section('content')
    <div class="flex flex-col w-full">
        <x-page-header
            :title="$title"
            :subtitle="$description"
            badge="Ikhtisar Perpustakaan"
        />

        <div class="flex flex-col gap-gutter">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-gutter">
                <x-glass-card class="group relative transition-all duration-300 hover:-translate-y-1 hover:shadow-[0_22px_44px_-8px_rgba(79,107,245,0.18)] hover:bg-surface-container-lowest/60 flex flex-col justify-between overflow-hidden">
                    <div class="flex items-center justify-between mb-8">
                        <div class="w-14 h-14 rounded-2xl bg-gradient-to-tr from-[#bac3ff]/40 to-[#c7bfff]/30 backdrop-blur-md shadow-[inset_0_1px_1px_rgba(255,255,255,0.9)] flex items-center justify-center text-primary transition-transform duration-300 group-hover:scale-105">
                            <span class="material-symbols-outlined text-[28px]" style="font-variation-settings: 'FILL' 1;">menu_book</span>
                        </div>
                        <span class="text-label-caps font-bold text-outline uppercase tracking-wider px-2.5 py-1 rounded-full bg-surface-container-lowest/40 backdrop-blur-sm">Koleksi</span>
                    </div>
                    <div class="flex flex-col gap-1">
                        <span class="text-stat-xl font-bold tracking-tight text-[#1B2440] leading-none">{{ $bookCount }}</span>
                        <span class="text-label-lg font-medium text-[#5B6788]">Jumlah Buku</span>
                    </div>
                </x-glass-card>

                <x-glass-card class="group relative transition-all duration-300 hover:-translate-y-1 hover:shadow-[0_22px_44px_-8px_rgba(79,107,245,0.18)] hover:bg-surface-container-lowest/60 flex flex-col justify-between overflow-hidden">
                    <div class="flex items-center justify-between mb-8">
                        <div class="w-14 h-14 rounded-2xl bg-gradient-to-tr from-[#87f1e9]/40 to-[#dee1ff]/30 backdrop-blur-md shadow-[inset_0_1px_1px_rgba(255,255,255,0.9)] flex items-center justify-center text-secondary transition-transform duration-300 group-hover:scale-105">
                            <span class="material-symbols-outlined text-[28px]" style="font-variation-settings: 'FILL' 1;">group</span>
                        </div>
                        <span class="text-label-caps font-bold text-outline uppercase tracking-wider px-2.5 py-1 rounded-full bg-surface-container-lowest/40 backdrop-blur-sm">Aktif</span>
                    </div>
                    <div class="flex flex-col gap-1">
                        <span class="text-stat-xl font-bold tracking-tight text-[#1B2440] leading-none">{{ $memberCount }}</span>
                        <span class="text-label-lg font-medium text-[#5B6788]">Jumlah Anggota</span>
                    </div>
                </x-glass-card>

                <x-glass-card class="group relative transition-all duration-300 hover:-translate-y-1 hover:shadow-[0_22px_44px_-8px_rgba(79,107,245,0.18)] hover:bg-surface-container-lowest/60 flex flex-col justify-between overflow-hidden">
                    <div class="flex items-center justify-between mb-8">
                        <div class="w-14 h-14 rounded-2xl bg-gradient-to-tr from-[#dee1ff]/50 to-[#e4dfff]/40 backdrop-blur-md shadow-[inset_0_1px_1px_rgba(255,255,255,0.9)] flex items-center justify-center text-tertiary transition-transform duration-300 group-hover:scale-105">
                            <span class="material-symbols-outlined text-[28px]" style="font-variation-settings: 'FILL' 1;">bookmarks</span>
                        </div>
                        <span class="text-label-caps font-bold text-outline uppercase tracking-wider px-2.5 py-1 rounded-full bg-surface-container-lowest/40 backdrop-blur-sm">Klasifikasi</span>
                    </div>
                    <div class="flex flex-col gap-1">
                        <span class="text-stat-xl font-bold tracking-tight text-[#1B2440] leading-none">{{ $categoryCount }}</span>
                        <span class="text-label-lg font-medium text-[#5B6788]">Jumlah Kategori</span>
                    </div>
                </x-glass-card>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-gutter">
                <x-glass-card class="group relative transition-all duration-300 hover:-translate-y-1 hover:shadow-[0_22px_44px_-8px_rgba(79,107,245,0.18)] hover:bg-surface-container-lowest/60 flex flex-col justify-between overflow-hidden">
                    <div class="flex items-center justify-between mb-10">
                        <div class="w-16 h-16 rounded-2xl bg-gradient-to-tr from-[#c7bfff]/40 to-[#dee1ff]/40 backdrop-blur-md shadow-[inset_0_1px_1px_rgba(255,255,255,0.9)] flex items-center justify-center text-tertiary-container transition-transform duration-300 group-hover:scale-105">
                            <span class="material-symbols-outlined text-[32px]" style="font-variation-settings: 'FILL' 1;">assignment</span>
                        </div>
                        <div class="flex items-center gap-1.5 px-3 py-1 rounded-full bg-surface-container-lowest/50 backdrop-blur-sm text-[#5B6788]">
                            <span class="material-symbols-outlined text-[16px]">sync_alt</span>
                            <span class="text-label-caps font-bold uppercase tracking-wider">Total Sirkulasi</span>
                        </div>
                    </div>
                    <div class="flex flex-col gap-1">
                        <span class="text-stat-xl font-bold tracking-tight text-[#1B2440] leading-none">{{ $borrowingCount }}</span>
                        <span class="text-body-md font-medium text-[#5B6788]">Jumlah Peminjaman</span>
                    </div>
                </x-glass-card>

                <div class="group relative rounded-[32px] p-space-lg lg:p-space-xl bg-surface-container-lowest/55 backdrop-blur-[28px] shadow-[0_16px_36px_-10px_rgba(245,158,75,0.15),0_8px_24px_-4px_rgba(79,107,245,0.08),inset_0_1px_1px_0_rgba(255,255,255,0.95)] transition-all duration-300 hover:-translate-y-1 hover:shadow-[0_24px_48px_-8px_rgba(245,158,75,0.22)] hover:bg-surface-container-lowest/65 flex flex-col justify-between overflow-hidden">
                    <div class="absolute -top-12 -right-12 w-36 h-36 rounded-full bg-[#F59E4B]/10 blur-2xl pointer-events-none"></div>
                    <div class="flex items-center justify-between mb-10 relative">
                        <div class="w-16 h-16 rounded-2xl bg-gradient-to-tr from-[#ffdad6]/60 to-[#ffd8cc]/40 backdrop-blur-md shadow-[inset_0_1px_1px_rgba(255,255,255,0.9)] flex items-center justify-center text-[#F59E4B] transition-transform duration-300 group-hover:scale-105">
                            <span class="material-symbols-outlined text-[32px]" style="font-variation-settings: 'FILL' 1;">pending_actions</span>
                        </div>
                        <div class="flex items-center gap-1.5 px-3 py-1 rounded-full bg-[#F59E4B]/15 backdrop-blur-sm text-[#F59E4B]">
                            <span class="w-1.5 h-1.5 rounded-full bg-[#F59E4B] animate-ping"></span>
                            <span class="text-label-caps font-bold uppercase tracking-wider">Sedang Dipinjam</span>
                        </div>
                    </div>
                    <div class="flex flex-col gap-1 relative">
                        <div class="flex items-baseline gap-3">
                            <span class="text-stat-xl font-bold tracking-tight text-[#1B2440] leading-none">{{ $activeBorrowingCount }}</span>
                            @if ($activeBorrowingCount > 0)
                                <span class="text-label-md font-semibold text-[#F59E4B] px-2 py-0.5 rounded-full bg-[#F59E4B]/10">Menunggu Pengembalian</span>
                            @endif
                        </div>
                        <span class="text-body-md font-medium text-[#5B6788]">Peminjaman Berjalan</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
