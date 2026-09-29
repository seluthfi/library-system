<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\MemberController;
use App\Http\Controllers\DashboardController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/books', [BookController::class, 'index'])->name('buku');

Route::get('/books/{id}', [BookController::class, 'show'])->name('buku.show');

Route::get('/categories', [CategoryController::class, 'index'])->name('kategori');

Route::get('/members', [MemberController::class, 'index'])->name('anggota');

Route::get('/dashboard', [DashboardController::class, 'index']);