@extends('layouts.app')

@section('title', 'Daftar Buku')

@section('content')
    <h2>{{ $title }}</h2>
    <p><a href="{{ route('books.create') }}">Tambah Buku Baru</a></p>

    <ul>
        @foreach($books as $book)
            <li>
                <h3>{{ $book->title }}</h3>
                <a href="{{ route('books.show', $book->id) }}">Detail Buku</a>
                <a href="{{ route('books.edit', $book->id) }}">Edit Buku</a>
                <form action="{{ route('books.destroy', $book->id) }}" method="POST" style="display: inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit">Hapus Buku</button>
                </form>
            </li>
        @endforeach
    </ul>
@endsection