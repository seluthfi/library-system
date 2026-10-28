@extends('layouts.app')

@section('title', 'Daftar Buku')

@section('content')
    @if (@session('success'))
        <p>{{ session('success') }}</p>
    @endif
        
    <h2>{{ $title }}</h2>
    <p><a href="{{ route('books.create') }}">Tambah Buku Baru</a></p>

    <ul>
        @foreach($books as $book)
            <li>
                <h3>{{ $book->title }} <small>({{ $book->category->name ?? 'Belum ada kategori' }})</small></h3>
                <a href="{{ route('books.show', $book->id) }}">Detail Buku</a>
                <a href="{{ route('books.edit', $book->id) }}">Edit Buku</a> </br>
                <form action="{{ route('books.destroy', $book->id) }}" method="POST" 
                    onsubmit="return confirm('Apakah Anda yakin ingin menghapus buku ini?');" style="display: inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit">Hapus Buku</button>
                </form>
            </li>
        @endforeach
    </ul>
@endsection