<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;

class BookController extends Controller
{
    public function index()
    {
        $title = 'Daftar Buku';
        $books = Book::all();
        return view('books.index', compact('title', 'books'));
    }

    public function create()
    {
        $title = 'Tambah Buku';
        return view('books.create');
    }

    public function store(Request $request)
    {
        Book::create([
            'title' => $request->title,
            'author' => $request->author,
            'year' => $request->year,
            'stock' => $request->stock,
            ]);
            
        return redirect()->route('books.index');
    }

    public function show(string $id)
    {
        $title = 'Detail Buku';
        $book = Book::findOrFail($id);

        return view('books.show', compact('title', 'book'));
    }

    public function edit(Book $book)
    {
        $title = 'Edit Buku';
        return view('books.edit', compact('title', 'book'));
    }

    public function update(Request $request, Book $book)
    {
        $book->update([
            'title' => $request->title,
            'author' => $request->author,
            'year' => $request->year,
            'stock' => $request->stock,
        ]);

        return redirect()->route('books.index');
    }

    public function destroy(Book $book)
    {
        $book->delete();
        return redirect()->route('books.index');
    }
}