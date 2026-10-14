@extends('layouts.app')

@section('title', $title)

@section('content')
    <a href="{{ route('books.index') }}">Daftar Buku</a>

    @if($book)
        <p><strong>ID:</strong> {{ $book->id }}</p>
        <p><strong>Judul:</strong> {{ $book->title }}</p>
        <p><strong>Penulis:</strong> {{ $book->author }}</p>
        <p><strong>Tahun Terbit:</strong> {{ $book->year }}</p>
        <p><strong>Stok:</strong> {{ $book->stock }}</p>
    @else
        <p>Buku tidak ditemukan.</p>
    @endif

@endsection