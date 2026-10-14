@extends('layouts.app')

@section('title', 'Edit Buku')

@section('content')
<h1>Edit Buku</h1>
<form action="{{ route('books.update', $book->id) }}" method="POST">
    @csrf
    @method('PUT')

    <input type="text" name="title" placeholder="Judul Buku" value="{{ $book->title }}">
    <input type="text" name="author" placeholder="Penulis" value="{{ $book->author }}">
    <input type="number" name="year" placeholder="Tahun Terbit" value="{{ $book->year }}">
    <input type="number" name="stock" placeholder="Stok Buku" value="{{ $book->stock }}">

    <button type="submit">
        Simpan
    </button>
</form>
@endsection