@extends('layouts.app')

@section('title', 'Detail Buku')

@section('content')

    <h2>Detail Buku</h2>

    @if($book)
        <p><strong>ID:</strong> {{ $id }}</p>
        <p><strong>Judul:</strong> {{ $book['title'] }}</p>
        <p><strong>Penulis:</strong> {{ $book['author'] }}</p>
        <p><strong>Tahun Terbit:</strong> {{ $book['year'] }}</p>
    @else
        <p>Buku tidak ditemukan.</p>
    @endif

@endsection