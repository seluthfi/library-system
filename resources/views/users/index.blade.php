@extends('layouts.app')

@section('title', 'Kelola Pengguna')

@section('content')
    <h2>{{ $title }}</h2>
    <table border="1" cellpadding="6">
        <tr><th>Nama</th><th>Email</th><th>Role</th></tr>
        @foreach ($users as $user)
            <tr>
                <td>{{ $user->name }}</td>
                <td>{{ $user->email }}</td>
                <td>{{ $user->role }}</td>
            </tr>
        @endforeach
    </table>
@endsection