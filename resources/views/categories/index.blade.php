@extends('layouts.app')

@section('title', $title)

@section('content')

    <h2>{{ $title }}</h2>

    <ul>
        @foreach($categories as $category)
            <li>{{ $category->name }} ({{ $category->books_count }} buku)</li>
        @endforeach
    </ul>

@endsection
