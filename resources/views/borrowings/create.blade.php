@extends('layouts.app')

@section('title', $title ?? 'Tambah Peminjaman')

@section('content')
    <div class="w-full max-w-[800px] mx-auto">
        <div class="flex flex-col sm:flex-row sm:items-end justify-between gap-space-sm mb-space-lg">
            <div>
                <span class="text-label-caps font-bold text-primary uppercase tracking-widest block mb-space-xs">Sirkulasi Perpustakaan</span>
                <h1 class="text-headline-lg font-bold text-on-surface">{{ $title ?? 'Tambah Peminjaman' }}</h1>
            </div>
            <div class="flex items-center gap-space-xs px-space-md py-1.5 rounded-full bg-surface-container-lowest/45 backdrop-blur-xl shadow-[inset_0_1px_1px_rgba(255,255,255,0.85)]">
                <span class="material-symbols-outlined text-[16px] text-primary">menu_book</span>
                <span class="text-label-md font-semibold text-on-surface-variant" id="total-selected-badge">0 Buku Dipilih</span>
            </div>
        </div>

        @if ($errors->any())
            <x-alert type="error">
                <p class="font-semibold mb-1">Terdapat kesalahan pada formulir</p>
                <ul class="list-disc list-inside text-body-sm space-y-0.5">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </x-alert>
        @endif

        <form action="{{ route('borrowings.store') }}" method="POST"
              class="p-space-lg sm:p-space-xl rounded-lg bg-surface-container-lowest/45 backdrop-blur-2xl shadow-[0_20px_48px_-6px_rgba(79,107,245,0.12),0_8px_20px_-4px_rgba(27,36,64,0.04),inset_0_1px_1px_rgba(255,255,255,0.9)] flex flex-col gap-space-xl">
            @csrf

            <x-select-pill name="member_id" label="Anggota" required>
                <option value="">Pilih Anggota</option>
                @foreach ($members as $member)
                    <option value="{{ $member->id }}" @selected(old('member_id') == $member->id)>
                        {{ $member->member_code }} - {{ $member->name }}
                    </option>
                @endforeach
            </x-select-pill>

            <div class="flex flex-col gap-space-sm">
                <div class="flex items-center justify-between">
                    <label class="text-label-lg font-semibold text-on-surface">Daftar Buku</label>
                    <span class="text-body-sm text-on-surface-variant">Masukkan jumlah pinjam</span>
                </div>

                @error('books')
                    <p class="text-body-sm font-medium text-error">{{ $message }}</p>
                @enderror

                <div class="overflow-x-auto rounded-lg bg-surface-container-lowest/40 backdrop-blur-xl shadow-[inset_0_1px_1px_rgba(255,255,255,0.85)]">
                    <table class="w-full text-left border-collapse">
                        <thead>
                            <tr class="bg-surface-container-lowest/45">
                                <th class="py-space-md px-space-lg text-label-caps font-bold text-on-surface-variant uppercase tracking-wider">Judul Buku</th>
                                <th class="py-space-md px-space-md text-label-caps font-bold text-on-surface-variant uppercase tracking-wider text-center">Stok Tersedia</th>
                                <th class="py-space-md px-space-lg text-label-caps font-bold text-on-surface-variant uppercase tracking-wider text-right">Jumlah Pinjam</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-surface-container-high/40">
                            @forelse ($books as $book)
                                <tr class="hover:bg-surface-container-lowest/40 transition-colors">
                                    <td class="py-space-md px-space-lg text-body-md text-on-surface font-medium">{{ $book->title }}</td>
                                    <td class="py-space-md px-space-md text-center">
                                        <span class="inline-flex items-center justify-center px-3 py-1 rounded-full bg-secondary-container/50 text-on-secondary-container text-label-md font-semibold">
                                            {{ $book->stock }}
                                        </span>
                                    </td>
                                    <td class="py-space-md px-space-lg text-right">
                                        <input
                                            type="number"
                                            name="books[{{ $book->id }}]"
                                            value="{{ old('books.' . $book->id, 0) }}"
                                            min="0"
                                            max="{{ $book->stock }}"
                                            class="book-qty-input w-20 text-center px-3 py-1.5 rounded-full bg-surface-container-lowest/55 backdrop-blur-md text-label-lg font-semibold text-on-surface shadow-[inset_0_1px_1px_rgba(255,255,255,0.9)] focus:outline-none focus:bg-surface-container-lowest/85 focus:ring-2 focus:ring-primary/40 transition-all"
                                        >
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="3" class="py-space-lg px-space-lg text-center text-on-surface-variant">
                                        Tidak ada buku dengan stok tersedia.
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>

            <div class="flex flex-col-reverse sm:flex-row items-center justify-end gap-space-md pt-space-sm">
                <a href="{{ route('borrowings.index') }}"
                   class="w-full sm:w-auto text-center px-space-lg py-3 rounded-full text-label-lg font-semibold text-on-surface hover:bg-primary/10 transition-all">
                    Batal
                </a>
                <x-primary-button class="w-full sm:w-auto px-space-xl">
                    <span class="material-symbols-outlined text-[18px]">check_circle</span>
                    <span>Simpan Peminjaman</span>
                </x-primary-button>
            </div>
        </form>
    </div>

    <script>
        (function () {
            const qtyInputs = document.querySelectorAll('.book-qty-input');
            const badge = document.getElementById('total-selected-badge');

            function updateTotal() {
                let total = 0;
                qtyInputs.forEach((input) => {
                    const val = parseInt(input.value, 10);
                    if (!isNaN(val) && val > 0) {
                        total += val;
                    }
                });
                if (badge) {
                    badge.textContent = total + ' Buku Dipilih';
                }
            }

            qtyInputs.forEach((input) => {
                input.addEventListener('input', updateTotal);
            });
            updateTotal();
        })();
    </script>
@endsection
