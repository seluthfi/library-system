@extends('layouts.app')

@section('title', $title)

@section('content')
    @if (session('success'))
        <p>{{ session('success') }}</p>
    @endif

    @if ($errors->any())
        <div>
            @foreach ($errors->all() as $error)
                <p>{{ $error }}</p>
            @endforeach
        </div>
    @endif

    <h2>{{ $title }}</h2>

    <p><a href="{{ route('borrowings.create') }}">Tambah Peminjaman</a></p>

    <table border="1" cellpadding="6" cellspacing="0">
        <thead>
            <tr>
                <th>Anggota</th>
                <th>Petugas</th>
                <th>Tanggal Pinjam</th>
                <th>Jatuh Tempo</th>
                <th>Tanggal Kembali</th>
                <th>Status</th>
                <th>Daftar Buku</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($borrowings as $borrowing)
                <tr>
                    <td>{{ $borrowing->member->name ?? '-' }}</td>
                    <td>{{ $borrowing->user->name ?? '-' }}</td>
                    <td>{{ $borrowing->borrowing_date }}</td>
                    <td>{{ $borrowing->due_date }}</td>
                    <td>{{ $borrowing->return_date ?? '-' }}</td>
                    <td>{{ $borrowing->status }}</td>
                    <td>
                        <ul>
                            @foreach ($borrowing->details as $detail)
                                <li>{{ $detail->book->title ?? '-' }} ({{ $detail->quantity }})</li>
                            @endforeach
                        </ul>
                    </td>
                    <td>
                        @if ($borrowing->status === 'borrowed')
                            <form action="{{ route('borrowings.return', $borrowing->id) }}" method="POST"
                                onsubmit="return confirm('Apakah Anda yakin ingin mengembalikan peminjaman ini?');" style="display: inline;">
                                @csrf
                                <button type="submit">Kembalikan</button>
                            </form>
                        @else
                            -
                        @endif
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="8">Belum ada transaksi peminjaman.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
@endsection
