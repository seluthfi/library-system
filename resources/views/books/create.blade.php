@extends('layouts.app')

@section('content')
<h1>Tambah Buku Baru</h1>
<form action="{{ route('books.store') }}" method="POST">
    @csrf

    <div>
        <label>Judul Buku</label>
        <input type="text" name="title" placeholder="Judul Buku" value="{{ old('title') }}">

        @error('title')
            <p>{{ $message }}</p>
        @enderror
    </div>  
    
    <div>
        <label>Penulis</label>
        <input type="text" name="author" placeholder="Penulis" value="{{ old('author') }}">

        @error('author')
            <p>{{ $message }}</p>
        @enderror

    </div>

    <div>
        <label>Tahun Terbit</label>
        <input type="number" name="year" placeholder="Tahun Terbit" value="{{ old('year') }}">

        @error('year')
            <p>{{ $message }}</p>
        @enderror
    </div>

    <div>
        <label>Stok Buku</label>
        <input type="number" name="stock" placeholder="Stok Buku" value="{{ old('stock') }}">

        @error('stock')
            <p>{{ $message }}</p>
        @enderror
    </div>
    
    {{-- <input type="text" name="title" placeholder="Judul Buku">
    <input type="text" name="author" placeholder="Penulis">
    <input type="number" name="year" placeholder="Tahun Terbit">
    <input type="number" name="stock" placeholder="Stok Buku"> --}}

    <button type="submit">
        Simpan
    </button>
</form>
@endsection