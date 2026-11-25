<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Login - Library System')</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="min-h-screen relative bg-surface text-on-surface font-sans text-body-md overflow-x-hidden selection:bg-primary-fixed selection:text-on-primary-fixed flex flex-col justify-center">
    <div class="fixed inset-0 pointer-events-none -z-10 overflow-hidden bg-gradient-to-br from-[#E8EDFB] via-[#ECE5F8] to-[#FCEEE9]">
        <div class="absolute -top-32 -left-32 w-96 h-96 rounded-full bg-gradient-to-tr from-[#bac3ff]/60 to-[#c7bfff]/50 blur-3xl opacity-75"></div>
        <div class="absolute top-1/4 -right-28 w-[32rem] h-[32rem] rounded-full bg-gradient-to-bl from-[#ffd8cc]/50 to-[#dee1ff]/60 blur-3xl opacity-70"></div>
        <div class="absolute -bottom-24 left-1/3 w-[36rem] h-[36rem] rounded-full bg-gradient-to-t from-[#c7bfff]/50 via-[#87f1e9]/20 to-[#e4dfff]/60 blur-3xl opacity-60"></div>
    </div>

    <main class="w-full py-space-xl px-gutter-sm sm:px-space-lg">
        @yield('content')
    </main>
</body>
</html>
