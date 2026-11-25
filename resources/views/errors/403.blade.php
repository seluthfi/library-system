@extends('layouts.app')

@section('title', '403 - Akses Ditolak')

@section('content')
    <div class="flex flex-col w-full items-center justify-center min-h-[calc(100vh-220px)] py-space-lg relative overflow-hidden">
        <div class="relative w-full max-w-md mx-auto p-8 sm:p-10 text-center rounded-xl backdrop-blur-2xl bg-surface-container-lowest/75 shadow-[0_24px_56px_-12px_rgba(79,107,245,0.18),0_8px_24px_-4px_rgba(27,36,64,0.06)] transition-all duration-500">
            <div class="absolute inset-0 rounded-xl pointer-events-none shadow-[inset_0_1px_2px_0_rgba(255,255,255,0.9),inset_0_-1px_2px_0_rgba(124,108,240,0.08)]"></div>

            <div class="relative w-20 h-20 rounded-lg mx-auto mb-6 flex items-center justify-center bg-gradient-to-br from-error-container/60 via-surface-container-lowest/80 to-surface-container-high/60 shadow-[0_12px_24px_-6px_rgba(186,26,26,0.18),inset_0_1px_2px_rgba(255,255,255,0.9)] backdrop-blur-md">
                <svg class="w-9 h-9 text-error drop-shadow-[0_2px_8px_rgba(186,26,26,0.25)]" fill="none" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path d="M6 10V8C6 4.68629 8.68629 2 12 2C15.3137 2 18 4.68629 18 8V10H19C20.1046 10 21 10.8954 21 12V20C21 21.1046 20.1046 22 19 22H5C3.89543 22 3 21.1046 3 20V12C3 10.8954 3.89543 10 5 10H6ZM8 8C8 5.79086 9.79086 4 12 4C14.2091 4 16 5.79086 16 8V10H8V8ZM12 14C11.1716 14 10.5 14.6716 10.5 15.5C10.5 16.0962 10.8496 16.6108 11.3571 16.8524L11 19.5H13L12.6429 16.8524C13.1504 16.6108 13.5 16.0962 13.5 15.5C13.5 14.6716 12.8284 14 12 14Z" fill="currentColor"></path>
                </svg>
            </div>

            <div class="relative text-display-lg font-bold tracking-tight mb-2 select-none">
                <span class="bg-gradient-to-r from-error via-primary to-tertiary bg-clip-text text-transparent inline-block">
                    403
                </span>
            </div>

            <h1 class="text-headline-md font-semibold text-on-surface tracking-tight mb-2">
                Akses Ditolak
            </h1>

            <p class="text-body-md text-on-surface-variant mb-space-xl max-w-xs mx-auto">
                {{ $exception->getMessage() ?: 'Anda tidak memiliki hak akses.' }}
            </p>

            <div class="mb-8 px-space-md py-2 rounded-full bg-surface-container/60 backdrop-blur-md inline-flex items-center gap-space-xs text-on-surface-variant shadow-[inset_0_1px_1px_rgba(255,255,255,0.7)]">
                <span class="w-2 h-2 rounded-full bg-error animate-pulse"></span>
                <span class="text-label-caps font-bold uppercase tracking-wider text-outline">
                    Peran {{ ucfirst(auth()->user()->role ?? 'Tamu') }} • Otoritas Terbatas
                </span>
            </div>

            <div class="flex flex-col sm:flex-row items-center justify-center gap-space-sm w-full">
                <a href="{{ route('dashboard') }}"
                   class="w-full sm:w-auto inline-flex items-center justify-center gap-space-xs px-8 py-3.5 rounded-full bg-gradient-to-r from-primary to-tertiary text-on-primary text-label-lg font-semibold shadow-[0_10px_28px_-4px_rgba(79,107,245,0.4)] transition-all duration-300 hover:shadow-[0_14px_34px_-2px_rgba(79,107,245,0.5)] hover:scale-[1.02] active:scale-[0.98]">
                    <span class="material-symbols-outlined text-[18px]">arrow_back</span>
                    <span>Kembali ke Dashboard</span>
                </a>
            </div>

            <div class="mt-space-lg pt-space-md flex items-center justify-center gap-space-sm text-outline">
                <a href="{{ route('books.index') }}" class="text-label-md font-semibold hover:text-primary transition-colors flex items-center gap-1">
                    <span class="material-symbols-outlined text-[15px]">library_books</span>
                    Katalog Buku
                </a>
                <span class="text-outline-variant text-label-caps">•</span>
                <a href="{{ route('borrowings.index') }}" class="text-label-md font-semibold hover:text-primary transition-colors flex items-center gap-1">
                    <span class="material-symbols-outlined text-[15px]">swap_horiz</span>
                    Peminjaman
                </a>
            </div>
        </div>
    </div>
@endsection
