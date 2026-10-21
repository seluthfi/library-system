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
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'author' => 'required|string|max:255',
            'year' => 'required|integer|min:1990',
            'stock' => 'required|integer|min:0',
        ]);

        Book::create($validated);
        
        // Book::create([
        //    'title' => $request->title,
        //    'author' => $request->author,
        //    'year' => $request->year,
        //    'stock' => $request->stock,
        // ]);
            
        return redirect()
            ->route('books.index')
            ->with('success', 'Data Buku berhasil ditambahkan.');
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
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'author' => 'required|string|max:255',
            'year' => 'required|integer|min:1990',
            'stock' => 'required|integer|min:0',
        ]);
    
        // $book->update([
        //     'title' => $request->title,
        //     'author' => $request->author,
        //     'year' => $request->year,
        //     'stock' => $request->stock,
        // ]);

        return redirect()
            ->route('books.index')
            ->with('success', 'Data Buku berhasil diupdate.');
    }

    public function destroy(Book $book)
    {
        $book->delete();
        return redirect()
            ->route('books.index')
            ->with('success', 'Data Buku berhasil dihapus.');
    }
}