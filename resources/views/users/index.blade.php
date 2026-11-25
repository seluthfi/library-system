@extends('layouts.app')

@section('title', $title ?? 'Kelola Pengguna')

@section('content')
    <div class="w-full max-w-5xl mx-auto">
        <div class="flex flex-col md:flex-row md:items-end justify-between gap-space-md mb-space-lg">
            <div class="flex flex-col">
                <div class="flex items-center gap-space-xs text-primary mb-1">
                    <span class="material-symbols-outlined text-[16px]">verified_user</span>
                    <span class="text-label-caps uppercase text-primary font-semibold tracking-wider">Manajemen Pengguna &amp; Akses</span>
                </div>
                <h1 class="text-headline-lg font-bold text-on-surface tracking-tight">{{ $title ?? 'Kelola Pengguna' }}</h1>
                <p class="text-body-md text-on-surface-variant max-w-xl mt-1">
                    Daftar akun pengguna, hak akses, dan peran staf perpustakaan.
                </p>
            </div>

            <div class="inline-flex items-center gap-space-md px-space-md py-2.5 rounded-full bg-surface-container-lowest/60 backdrop-blur-xl shadow-[0_8px_20px_-4px_rgba(79,107,245,0.08)] self-start md:self-auto">
                <div class="flex items-center gap-space-xs">
                    <span class="w-2 h-2 rounded-full bg-secondary"></span>
                    <span class="text-label-md font-semibold text-on-surface">{{ $users->count() }} Pengguna Terdaftar</span>
                </div>
            </div>
        </div>

        <x-glass-card class="relative overflow-hidden">
            <div class="w-full overflow-x-auto">
                <table class="w-full text-left border-collapse">
                    <thead>
                        <tr class="bg-surface-container-low/40 rounded-full">
                            <th class="py-3.5 pl-space-md pr-space-sm text-label-caps uppercase text-on-surface-variant font-semibold tracking-wider rounded-l-full" scope="col">
                                Nama
                            </th>
                            <th class="py-3.5 px-space-md text-label-caps uppercase text-on-surface-variant font-semibold tracking-wider" scope="col">
                                Email
                            </th>
                            <th class="py-3.5 pl-space-sm pr-space-md text-label-caps uppercase text-on-surface-variant font-semibold tracking-wider text-right rounded-r-full" scope="col">
                                Role
                            </th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-surface-container-high/40">
                        @forelse ($users as $user)
                            @php
                                $initials = collect(explode(' ', trim($user->name)))
                                    ->filter()
                                    ->take(2)
                                    ->map(fn ($w) => mb_strtoupper(mb_substr($w, 0, 1)))
                                    ->implode('');
                                $isAdmin = $user->role === 'admin';
                            @endphp
                            <tr class="group transition-colors duration-200 hover:bg-surface-container-low/50">
                                <td class="py-space-md pl-space-md pr-space-sm whitespace-nowrap">
                                    <div class="flex items-center gap-space-sm min-w-0">
                                        <div class="w-11 h-11 shrink-0 rounded-full bg-gradient-to-tr {{ $isAdmin ? 'from-primary to-tertiary-container text-on-primary' : 'from-secondary to-secondary-fixed-dim text-on-secondary' }} flex items-center justify-center text-label-lg font-bold shadow-[0_4px_12px_rgba(75,103,241,0.22)]">
                                            {{ $initials ?: '-' }}
                                        </div>
                                        <div class="flex flex-col min-w-0">
                                            <span class="text-headline-sm text-on-surface truncate font-semibold">
                                                {{ $user->name }}
                                            </span>
                                            <span class="text-body-sm text-on-surface-variant flex items-center gap-1">
                                                <span class="material-symbols-outlined text-[13px] {{ $isAdmin ? 'text-tertiary' : 'text-secondary' }}">
                                                    {{ $isAdmin ? 'shield_lock' : 'assignment_ind' }}
                                                </span>
                                                {{ $isAdmin ? 'Hak Akses Penuh' : 'Otorisasi Sirkulasi & Katalog' }}
                                            </span>
                                        </div>
                                    </div>
                                </td>
                                <td class="py-space-md px-space-md whitespace-nowrap">
                                    <div class="flex items-center gap-space-xs text-on-surface text-body-md">
                                        <span class="material-symbols-outlined text-[18px] text-outline">mail</span>
                                        <span class="font-medium tracking-tight">{{ $user->email }}</span>
                                    </div>
                                </td>
                                <td class="py-space-md pl-space-sm pr-space-md text-right whitespace-nowrap">
                                    <span class="inline-flex items-center gap-1.5 px-3.5 py-1 rounded-full text-label-md font-semibold shadow-[inset_0_1px_1px_rgba(255,255,255,0.8)] {{ $isAdmin ? 'text-tertiary bg-tertiary-fixed/60' : 'text-on-secondary-container bg-secondary-container/50' }}">
                                        <span class="w-1.5 h-1.5 rounded-full {{ $isAdmin ? 'bg-tertiary' : 'bg-secondary' }}"></span>
                                        {{ $user->role }}
                                    </span>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="3" class="py-space-xl px-space-md text-center text-on-surface-variant">
                                    Belum ada data pengguna.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <div class="mt-space-lg pt-space-md flex items-center gap-space-xs text-on-surface-variant text-body-sm bg-surface-container-low/30 backdrop-blur-md px-space-md py-3 rounded-full">
                <span class="material-symbols-outlined text-[18px] text-primary shrink-0">info</span>
                <span>Tampilan bersifat read-only (khusus administrator).</span>
            </div>
        </x-glass-card>
    </div>
@endsection
