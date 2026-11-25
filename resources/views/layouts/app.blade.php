<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Library System')</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="min-h-screen relative bg-surface text-on-surface font-sans text-body-md overflow-x-hidden selection:bg-primary-fixed selection:text-on-primary-fixed">
    <div class="fixed inset-0 pointer-events-none -z-10 overflow-hidden bg-gradient-to-br from-[#E8EDFB] via-[#ECE5F8] to-[#FCEEE9]">
        <div class="absolute -top-32 -left-32 w-96 h-96 rounded-full bg-gradient-to-tr from-[#bac3ff]/60 to-[#c7bfff]/50 blur-3xl opacity-75"></div>
        <div class="absolute top-1/4 -right-28 w-[32rem] h-[32rem] rounded-full bg-gradient-to-bl from-[#ffd8cc]/50 to-[#dee1ff]/60 blur-3xl opacity-70"></div>
        <div class="absolute -bottom-24 left-1/3 w-[36rem] h-[36rem] rounded-full bg-gradient-to-t from-[#c7bfff]/50 via-[#87f1e9]/20 to-[#e4dfff]/60 blur-3xl opacity-60"></div>
    </div>

    <header class="fixed top-6 left-0 right-0 z-50 px-gutter-sm sm:px-space-md">
        <div class="max-w-[1120px] mx-auto">
            <div class="h-16 px-space-md sm:px-space-lg rounded-full bg-surface-container-lowest/50 backdrop-blur-2xl shadow-[0_20px_48px_-6px_rgba(79,107,245,0.14),0_8px_20px_-4px_rgba(27,36,64,0.04)] flex items-center justify-between gap-space-sm">
                <a href="{{ route('dashboard') }}" class="flex items-center gap-space-sm shrink-0">
                    <div class="w-10 h-10 rounded-full bg-surface-container-lowest/70 backdrop-blur-md shadow-[inset_0_1px_1px_0_rgba(255,255,255,0.9)] flex items-center justify-center text-primary">
                        <span class="material-symbols-outlined text-[20px]">book_2</span>
                    </div>
                    <span class="text-headline-sm font-semibold tracking-tight text-on-surface hidden sm:inline-block">Library System</span>
                </a>

                @php
                    $activeClass = 'bg-gradient-to-r from-primary to-tertiary text-on-primary shadow-[0_8px_20px_-2px_rgba(79,107,245,0.35)] shadow-inner';
                    $inactiveClass = 'text-on-surface-variant hover:text-on-surface';
                @endphp

                <nav class="flex items-center gap-1 sm:gap-space-xs overflow-x-auto py-1 px-1">
                    <a href="{{ route('dashboard') }}"
                       class="px-space-md py-1.5 rounded-full text-label-lg font-semibold transition-all whitespace-nowrap {{ request()->routeIs('dashboard') ? $activeClass : $inactiveClass }}">
                        Dashboard
                    </a>
                    <a href="{{ route('books.index') }}"
                       class="px-space-md py-1.5 rounded-full text-label-lg font-semibold transition-all whitespace-nowrap {{ request()->routeIs('books.*', 'buku.show') ? $activeClass : $inactiveClass }}">
                        Buku
                    </a>
                    <a href="{{ route('kategori') }}"
                       class="px-space-md py-1.5 rounded-full text-label-lg font-semibold transition-all whitespace-nowrap {{ request()->routeIs('kategori') ? $activeClass : $inactiveClass }}">
                        Kategori
                    </a>
                    <a href="{{ route('anggota') }}"
                       class="px-space-md py-1.5 rounded-full text-label-lg font-semibold transition-all whitespace-nowrap {{ request()->routeIs('anggota') ? $activeClass : $inactiveClass }}">
                        Anggota
                    </a>
                    <a href="{{ route('borrowings.index') }}"
                       class="px-space-md py-1.5 rounded-full text-label-lg font-semibold transition-all whitespace-nowrap {{ request()->routeIs('borrowings.*') ? $activeClass : $inactiveClass }}">
                        Peminjaman
                    </a>
                    @can('manage-users')
                        <a href="{{ route('users.index') }}"
                           class="px-space-md py-1.5 rounded-full text-label-lg font-semibold transition-all whitespace-nowrap {{ request()->routeIs('users.*') ? $activeClass : $inactiveClass }}">
                            Kelola Pengguna
                        </a>
                    @endcan
                </nav>

                <div class="shrink-0 flex items-center">
                    <form action="{{ route('logout') }}" method="POST" class="inline">
                        @csrf
                        <button type="submit"
                                class="px-space-md py-1.5 rounded-full text-label-lg font-semibold text-on-surface-variant hover:text-on-surface bg-surface-container-lowest/40 hover:bg-surface-container-lowest/80 backdrop-blur-md shadow-[inset_0_1px_1px_rgba(255,255,255,0.8)] transition-all cursor-pointer">
                            Logout
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </header>

    <main class="w-full pt-28 pb-space-xl min-h-[calc(100vh-80px)]">
        <div class="max-w-[1120px] mx-auto px-gutter-sm sm:px-space-lg lg:px-margin">
            @yield('content')
        </div>
    </main>

    <footer class="w-full pb-space-lg">
        <div class="max-w-[1120px] mx-auto px-gutter-sm sm:px-space-lg lg:px-margin">
            <div class="py-space-md bg-surface-container-lowest/30 backdrop-blur-md rounded-full shadow-[0_1px_8px_rgba(0,0,0,0.02)] text-center">
                <span class="text-label-md font-semibold text-outline tracking-wider uppercase">Library System</span>
            </div>
        </div>
    </footer>
</body>
</html>
