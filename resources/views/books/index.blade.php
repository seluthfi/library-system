@extends('layouts.app')

@section('title', 'Daftar Buku')

@section('content')
    <h2>{{ $title }}</h2>
    <h3>{{ $description }}</h3>

    <ul>
        @foreach($books as $book)
            <h3>{{ $book['title'] }}</h3>
            <p>Penulis: {{ $book['author'] }}</p>
            <p>Tahun: {{ $book['year'] }}</p>
            <p>Stok: {{ $book['stock'] }}</p>
        @endforeach
    </ul>

@endsection