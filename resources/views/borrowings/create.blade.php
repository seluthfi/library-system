@extends('layouts.app')

@section('title', $title)

@section('content')
    <h2>{{ $title }}</h2>

    @if ($errors->any())
        <div>
            @foreach ($errors->all() as $error)
                <p>{{ $error }}</p>
            @endforeach
        </div>
    @endif

    <form action="{{ route('borrowings.store') }}" method="POST">
        @csrf

        <div>
            <label>Anggota</label>
            <select name="member_id">
                <option value="">Pilih Anggota</option>
                @foreach ($members as $member)
                    <option value="{{ $member->id }}" @selected(old('member_id') == $member->id)>
                        {{ $member->member_code }} - {{ $member->name }}
                    </option>
                @endforeach
            </select>

            @error('member_id')
                <p>{{ $message }}</p>
            @enderror
        </div>

        <br>

        <div>
            <label>Daftar Buku</label>
            @error('books')
                <p>{{ $message }}</p>
            @enderror

            <table border="1" cellpadding="6" cellspacing="0">
                <thead>
                    <tr>
                        <th>Judul Buku</th>
                        <th>Stok Tersedia</th>
                        <th>Jumlah Pinjam</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($books as $book)
                        <tr>
                            <td>{{ $book->title }}</td>
                            <td>{{ $book->stock }}</td>
                            <td>
                                <input type="number" name="books[{{ $book->id }}]" value="{{ old('books.' . $book->id, 0) }}" min="0">
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="3">Tidak ada buku dengan stok tersedia.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <br>

        <button type="submit">Simpan Peminjaman</button>
        <a href="{{ route('borrowings.index') }}">Batal</a>
    </form>
@endsection
