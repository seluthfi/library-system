@extends('layouts.app')

@section('title', $title ?? 'Daftar Anggota')

@section('content')
    <div class="flex flex-col w-full">
        <div class="flex flex-col md:flex-row md:items-end justify-between gap-space-md mb-space-lg">
            <div class="space-y-space-xs">
                <div class="inline-flex items-center gap-space-xs px-space-md py-1 rounded-full bg-surface-container-lowest/60 backdrop-blur-md shadow-[0_4px_16px_rgba(79,107,245,0.08)]">
                    <span class="w-1.5 h-1.5 rounded-full bg-primary"></span>
                    <span class="text-label-caps font-bold text-on-surface-variant uppercase tracking-widest">
                        Direktori Anggota • {{ $members->count() }} Anggota Terdaftar
                    </span>
                </div>
                <h1 class="text-headline-lg font-bold text-on-surface tracking-tight">
                    {{ $title ?? 'Daftar Anggota' }}
                </h1>
                <p class="text-body-md text-on-surface-variant">
                    Daftar seluruh anggota perpustakaan yang terdaftar di sistem.
                </p>
            </div>
        </div>

        <div class="relative w-full rounded-xl bg-surface-container-lowest/50 backdrop-blur-2xl shadow-[0_20px_48px_-6px_rgba(79,107,245,0.12),0_8px_20px_-4px_rgba(27,36,64,0.04)] overflow-hidden">
            <div class="w-full h-px bg-gradient-to-r from-surface-container-lowest/90 via-surface-container-lowest/40 to-transparent"></div>
            <div class="overflow-x-auto w-full">
                <table class="w-full text-left border-collapse">
                    <thead>
                        <tr class="bg-surface-container-lowest/40 backdrop-blur-md">
                            <th class="py-space-md px-space-lg text-label-caps font-bold text-on-surface-variant uppercase tracking-widest" scope="col">
                                Kode Anggota
                            </th>
                            <th class="py-space-md px-space-lg text-label-caps font-bold text-on-surface-variant uppercase tracking-widest" scope="col">
                                Nama Lengkap
                            </th>
                            <th class="py-space-md px-space-lg text-label-caps font-bold text-on-surface-variant uppercase tracking-widest" scope="col">
                                No. Telepon
                            </th>
                            <th class="py-space-md px-space-lg text-label-caps font-bold text-on-surface-variant uppercase tracking-widest" scope="col">
                                Alamat Domisili
                            </th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-surface-container-high/60">
                        @forelse ($members as $member)
                            @php
                                $initials = collect(explode(' ', trim($member->name)))
                                    ->filter()
                                    ->take(2)
                                    ->map(fn ($word) => mb_strtoupper(mb_substr($word, 0, 1)))
                                    ->implode('');
                            @endphp
                            <tr class="group transition-all duration-200 hover:bg-surface-container-lowest/70">
                                <td class="py-space-md px-space-lg whitespace-nowrap">
                                    <span class="inline-flex items-center gap-1.5 px-space-md py-1 rounded-full bg-primary-fixed/50 text-on-primary-fixed text-label-md font-semibold shadow-[inset_0_1px_1px_rgba(255,255,255,0.8)]">
                                        <span class="w-1.5 h-1.5 rounded-full bg-primary"></span>
                                        {{ $member->member_code }}
                                    </span>
                                </td>
                                <td class="py-space-md px-space-lg whitespace-nowrap">
                                    <div class="flex items-center gap-space-sm">
                                        <div class="w-8 h-8 rounded-full bg-gradient-to-br from-primary-fixed to-tertiary-fixed flex items-center justify-center text-primary text-label-md font-semibold shadow-sm shrink-0">
                                            {{ $initials }}
                                        </div>
                                        <span class="text-headline-sm font-semibold text-on-surface">{{ $member->name }}</span>
                                    </div>
                                </td>
                                <td class="py-space-md px-space-lg whitespace-nowrap">
                                    <div class="flex items-center gap-space-xs text-on-surface-variant text-body-md">
                                        <span class="material-symbols-outlined text-[16px] text-outline">call</span>
                                        <span>{{ $member->phone }}</span>
                                    </div>
                                </td>
                                <td class="py-space-md px-space-lg text-on-surface-variant text-body-md">
                                    <div class="flex items-center gap-space-xs">
                                        <span class="material-symbols-outlined text-[16px] text-outline shrink-0">location_on</span>
                                        <span class="truncate max-w-sm">{{ $member->address }}</span>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4" class="py-space-xl px-space-lg text-center text-on-surface-variant">
                                    Belum ada data anggota.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
