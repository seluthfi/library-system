@extends('layouts.app')

@section('title', $title ?? 'Daftar Peminjaman')

@section('content')
    <div class="flex flex-col gap-space-lg w-full">
        @if (session('success'))
            <x-alert type="success">
                {{ session('success') }}
            </x-alert>
        @endif

        @if ($errors->any())
            <x-alert type="error">
                @foreach ($errors->all() as $error)
                    <p>{{ $error }}</p>
                @endforeach
            </x-alert>
        @endif

        <div class="flex flex-col sm:flex-row sm:items-end justify-between gap-space-md pt-space-xs">
            <div class="flex flex-col max-w-xl">
                <div class="flex items-center gap-2 mb-space-xs">
                    <span class="px-3 py-1 rounded-full text-label-caps font-bold bg-primary-fixed/60 text-on-primary-fixed tracking-wider uppercase shadow-[inset_0_1px_1px_rgba(255,255,255,0.8)]">
                        Sirkulasi &amp; Peminjaman
                    </span>
                </div>
                <h1 class="text-headline-lg text-on-surface tracking-tight font-bold">
                    {{ $title ?? 'Daftar Peminjaman' }}
                </h1>
                <p class="text-body-md text-on-surface-variant mt-1">
                    Kelola pencatatan sirkulasi, batas jatuh tempo, dan riwayat pengembalian koleksi buku.
                </p>
            </div>

            <div class="shrink-0 flex items-center">
                <a href="{{ route('borrowings.create') }}"
                   class="group relative px-6 py-3 rounded-full text-label-lg font-semibold text-on-primary bg-gradient-to-r from-primary to-tertiary-container shadow-[0_12px_28px_-4px_rgba(45,76,215,0.38),inset_0_1px_1px_rgba(255,255,255,0.4)] hover:shadow-[0_16px_36px_-4px_rgba(45,76,215,0.48)] hover:scale-[1.02] active:scale-[0.98] transition-all flex items-center gap-space-xs">
                    <span class="material-symbols-outlined text-[20px]">add</span>
                    <span>Tambah Peminjaman</span>
                </a>
            </div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-space-md">
            <div class="relative overflow-hidden rounded-lg bg-surface-container-lowest/45 backdrop-blur-2xl p-space-md shadow-[0_10px_26px_-4px_rgba(79,107,245,0.06),inset_0_1px_2px_rgba(255,255,255,0.85)] flex items-center gap-space-md">
                <div class="w-12 h-12 rounded-full bg-primary/10 text-primary flex items-center justify-center shrink-0">
                    <span class="material-symbols-outlined text-[24px]">import_contacts</span>
                </div>
                <div class="flex flex-col">
                    <span class="text-label-caps font-bold text-outline uppercase tracking-wider">Aktif Dipinjam</span>
                    <span class="text-headline-md font-bold text-on-surface">{{ $borrowedCount }} Peminjaman</span>
                </div>
            </div>

            <div class="relative overflow-hidden rounded-lg bg-surface-container-lowest/45 backdrop-blur-2xl p-space-md shadow-[0_10px_26px_-4px_rgba(79,107,245,0.06),inset_0_1px_2px_rgba(255,255,255,0.85)] flex items-center gap-space-md">
                <div class="w-12 h-12 rounded-full bg-secondary/10 text-secondary flex items-center justify-center shrink-0">
                    <span class="material-symbols-outlined text-[24px]">assignment_turned_in</span>
                </div>
                <div class="flex flex-col">
                    <span class="text-label-caps font-bold text-outline uppercase tracking-wider">Telah Kembali</span>
                    <span class="text-headline-md font-bold text-on-surface">{{ $returnedCount }} Peminjaman</span>
                </div>
            </div>

            <div class="relative overflow-hidden rounded-lg bg-surface-container-lowest/45 backdrop-blur-2xl p-space-md shadow-[0_10px_26px_-4px_rgba(79,107,245,0.06),inset_0_1px_2px_rgba(255,255,255,0.85)] flex items-center gap-space-md">
                <div class="w-12 h-12 rounded-full bg-tertiary/10 text-tertiary flex items-center justify-center shrink-0">
                    <span class="material-symbols-outlined text-[24px]">library_books</span>
                </div>
                <div class="flex flex-col">
                    <span class="text-label-caps font-bold text-outline uppercase tracking-wider">Total Item Sirkulasi</span>
                    <span class="text-headline-md font-bold text-on-surface">{{ $totalItemsCount }} Buku Fisik</span>
                </div>
            </div>
        </div>

        <div class="relative rounded-lg bg-surface-container-lowest/50 backdrop-blur-2xl shadow-[0_24px_54px_-10px_rgba(79,107,245,0.15),0_8px_22px_-4px_rgba(27,36,64,0.04),inset_0_1.5px_2px_rgba(255,255,255,0.95)] overflow-hidden">
            <div class="p-space-md sm:p-space-lg flex flex-col md:flex-row items-center justify-between gap-space-md bg-surface-container-lowest/20">
                <form action="{{ route('borrowings.index') }}" method="GET" class="relative w-full md:w-80">
                    @if ($status)
                        <input type="hidden" name="status" value="{{ $status }}">
                    @endif
                    <span class="material-symbols-outlined absolute left-4 top-1/2 -translate-y-1/2 text-[20px] text-outline">search</span>
                    <input type="text" name="q" value="{{ $q }}"
                           placeholder="Cari peminjam, judul buku, kode..."
                           class="w-full pl-11 pr-4 py-2.5 rounded-full bg-surface-container-lowest/60 text-on-surface text-body-sm placeholder:text-outline backdrop-blur-md shadow-[inset_0_1px_2px_rgba(255,255,255,0.8)] focus:outline-none focus:bg-surface-container-lowest focus:shadow-[0_0_0_3px_rgba(75,103,241,0.25)] transition-all">
                </form>

                @php
                    $tabActive = 'bg-primary text-on-primary shadow-[0_4px_14px_rgba(45,76,215,0.3)]';
                    $tabInactive = 'bg-surface-container-lowest/50 hover:bg-surface-container-lowest text-on-surface-variant hover:text-on-surface backdrop-blur-md shadow-[inset_0_1px_1px_rgba(255,255,255,0.8)]';
                @endphp

                <div class="flex items-center gap-space-xs w-full md:w-auto overflow-x-auto pb-1 md:pb-0">
                    <a href="{{ route('borrowings.index', array_filter(['q' => $q])) }}"
                       class="px-4 py-2 rounded-full text-label-md font-semibold whitespace-nowrap transition-all {{ !$status ? $tabActive : $tabInactive }}">
                        Semua ({{ $totalCount }})
                    </a>
                    <a href="{{ route('borrowings.index', array_filter(['status' => 'borrowed', 'q' => $q])) }}"
                       class="px-4 py-2 rounded-full text-label-md font-semibold whitespace-nowrap transition-all {{ $status === 'borrowed' ? $tabActive : $tabInactive }}">
                        Sedang Dipinjam ({{ $borrowedCount }})
                    </a>
                    <a href="{{ route('borrowings.index', array_filter(['status' => 'returned', 'q' => $q])) }}"
                       class="px-4 py-2 rounded-full text-label-md font-semibold whitespace-nowrap transition-all {{ $status === 'returned' ? $tabActive : $tabInactive }}">
                        Selesai ({{ $returnedCount }})
                    </a>
                </div>
            </div>

            <div class="overflow-x-auto w-full">
                <table class="w-full text-left border-collapse min-w-[960px]">
                    <thead>
                        <tr class="bg-surface-container-high/40 text-on-surface-variant text-label-caps font-bold uppercase tracking-wider">
                            <th class="py-space-md px-space-md pl-space-lg" scope="col">Anggota</th>
                            <th class="py-space-md px-space-md" scope="col">Petugas</th>
                            <th class="py-space-md px-space-md" scope="col">Tanggal Pinjam</th>
                            <th class="py-space-md px-space-md" scope="col">Jatuh Tempo</th>
                            <th class="py-space-md px-space-md" scope="col">Tanggal Kembali</th>
                            <th class="py-space-md px-space-md" scope="col">Status</th>
                            <th class="py-space-md px-space-md" scope="col">Daftar Buku</th>
                            <th class="py-space-md px-space-md pr-space-lg text-right" scope="col">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="text-body-sm text-on-surface divide-y divide-surface-container-high/50">
                        @forelse ($borrowings as $borrowing)
                            @php
                                $memberName = $borrowing->member->name ?? '-';
                                $initials = collect(explode(' ', trim($memberName)))
                                    ->filter()
                                    ->take(2)
                                    ->map(fn ($w) => mb_strtoupper(mb_substr($w, 0, 1)))
                                    ->implode('');
                            @endphp
                            <tr class="hover:bg-surface-container-lowest/70 transition-colors group">
                                <td class="py-space-lg px-space-md pl-space-lg align-middle">
                                    <div class="flex items-center gap-space-sm">
                                        <div class="w-10 h-10 rounded-full bg-gradient-to-tr from-primary to-tertiary text-on-primary flex items-center justify-center text-label-lg font-bold shrink-0 shadow-[0_4px_10px_rgba(45,76,215,0.25)]">
                                            {{ $initials ?: '-' }}
                                        </div>
                                        <div class="flex flex-col">
                                            <span class="text-label-lg font-semibold text-on-surface group-hover:text-primary transition-colors">
                                                {{ $memberName }}
                                            </span>
                                            <span class="text-label-caps text-outline font-medium">ID: {{ $borrowing->member->member_code ?? '-' }}</span>
                                        </div>
                                    </div>
                                </td>
                                <td class="py-space-lg px-space-md align-middle text-on-surface-variant">
                                    {{ $borrowing->user->name ?? '-' }}
                                </td>
                                <td class="py-space-lg px-space-md align-middle font-medium">
                                    <div class="flex items-center gap-1.5 text-on-surface-variant">
                                        <span class="material-symbols-outlined text-[16px] text-outline">calendar_today</span>
                                        <span>{{ $borrowing->borrowing_date }}</span>
                                    </div>
                                </td>
                                <td class="py-space-lg px-space-md align-middle">
                                    <div class="flex items-center gap-1.5 text-on-surface-variant font-semibold">
                                        <span class="material-symbols-outlined text-[16px] text-primary">event_upcoming</span>
                                        <span>{{ $borrowing->due_date }}</span>
                                    </div>
                                </td>
                                <td class="py-space-lg px-space-md align-middle text-on-surface-variant">
                                    {{ $borrowing->return_date ?? '-' }}
                                </td>
                                <td class="py-space-lg px-space-md align-middle">
                                    @if ($borrowing->status === 'borrowed')
                                        <x-badge variant="amber">borrowed</x-badge>
                                    @else
                                        <x-badge variant="secondary">{{ $borrowing->status }}</x-badge>
                                    @endif
                                </td>
                                <td class="py-space-lg px-space-md align-middle">
                                    <ul class="space-y-1">
                                        @foreach ($borrowing->details as $detail)
                                            <li class="text-body-sm text-on-surface">
                                                {{ $detail->book->title ?? '-' }} <span class="text-outline font-semibold">({{ $detail->quantity }})</span>
                                            </li>
                                        @endforeach
                                    </ul>
                                </td>
                                <td class="py-space-lg px-space-md pr-space-lg align-middle text-right">
                                    @if ($borrowing->status === 'borrowed')
                                        <form action="{{ route('borrowings.return', $borrowing->id) }}" method="POST"
                                              onsubmit="return confirm('Apakah Anda yakin ingin mengembalikan peminjaman ini?');"
                                              class="inline">
                                            @csrf
                                            <button type="submit"
                                                    class="px-4 py-1.5 rounded-full text-label-md font-semibold text-on-primary bg-gradient-to-r from-primary to-tertiary shadow-[0_6px_16px_-2px_rgba(45,76,215,0.35)] hover:shadow-[0_8px_20px_-2px_rgba(45,76,215,0.45)] transition-all cursor-pointer">
                                                Kembalikan
                                            </button>
                                        </form>
                                    @else
                                        <span class="text-outline">-</span>
                                    @endif
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="8" class="py-space-xl px-space-lg text-center text-on-surface-variant">
                                    Belum ada transaksi peminjaman.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            @if ($borrowings->hasPages())
                <div class="px-space-lg py-space-md bg-surface-container-lowest/30 border-t border-surface-container-high/50">
                    {{ $borrowings->links() }}
                </div>
            @endif
        </div>
    </div>
@endsection
