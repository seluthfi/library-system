@extends('layouts.guest')

@section('title', 'Login - Library System')

@section('content')
    <div class="flex flex-col w-full items-center justify-center">
        <div class="relative w-full max-w-[440px] rounded-lg p-8 md:p-10 bg-white/45 backdrop-blur-[28px] shadow-[0_24px_54px_-8px_rgba(79,107,245,0.18),0_8px_20px_-4px_rgba(27,36,64,0.06)] overflow-hidden transition-all duration-300">
            <div class="pointer-events-none absolute inset-0 rounded-lg bg-gradient-to-br from-white/90 via-white/20 to-white/5 opacity-80 [mask:linear-gradient(#fff_0_0)_content-box,linear-gradient(#fff_0_0)] [mask-composite:exclude] p-[1px]"></div>
            <div class="pointer-events-none absolute inset-0 rounded-lg shadow-[inset_0_1px_1px_0_rgba(255,255,255,0.9),inset_0_-1px_2px_0_rgba(124,108,240,0.08)]"></div>

            <div class="relative z-10 flex flex-col items-center">
                <div class="relative flex items-center justify-center w-16 h-16 rounded-[22px] bg-white/60 backdrop-blur-xl shadow-[0_12px_24px_-4px_rgba(79,107,245,0.22),0_4px_10px_0_rgba(255,255,255,0.8)_inset] mb-5">
                    <div class="pointer-events-none absolute inset-0 rounded-[22px] bg-gradient-to-b from-white/90 via-white/30 to-transparent p-[1px] [mask:linear-gradient(#fff_0_0)_content-box,linear-gradient(#fff_0_0)] [mask-composite:exclude]"></div>
                    <span class="material-symbols-outlined text-[32px] text-primary" style="font-variation-settings: 'FILL' 1, 'wght' 500;">
                        auto_stories
                    </span>
                </div>

                <h1 class="text-headline-md font-semibold text-on-surface text-center mb-6 tracking-tight">
                    Login Sistem Perpustakaan
                </h1>

                @if ($errors->any())
                    <div class="w-full mb-6 rounded-full bg-error-container/40 backdrop-blur-md px-4 py-3 flex items-center gap-3 shadow-[0_4px_14px_-2px_rgba(186,26,26,0.12),inset_0_1px_1px_rgba(255,255,255,0.6)]">
                        <span class="material-symbols-outlined text-error text-[20px] shrink-0" style="font-variation-settings: 'FILL' 1;">
                            error
                        </span>
                        <p class="text-body-sm text-error font-medium leading-snug">
                            {{ $errors->first() }}
                        </p>
                    </div>
                @endif

                <form action="{{ route('login.submit') }}" method="POST" class="w-full flex flex-col gap-5">
                    @csrf

                    <x-input-pill
                        name="email"
                        type="email"
                        label="Email"
                        placeholder="nama@email.com"
                        required
                        autofocus
                    />

                    <x-input-pill
                        name="password"
                        type="password"
                        label="Password"
                        placeholder="Password"
                        required
                    />

                    <div class="pt-2">
                        <x-primary-button class="w-full py-4">
                            <span>Login</span>
                        </x-primary-button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
