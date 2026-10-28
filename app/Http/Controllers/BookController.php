<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Models\Category;

class BookController extends Controller
{
    public function index()
    {
        $title = 'Daftar Buku';
        $books = Book::with('category')->get();

        return view('books.index', compact('title', 'books'));
    }

    public function create()
    {
        $title = 'Tambah Buku';
        $categories = Category::orderBy('name')->get();

        return view('books.create', compact('categories'));
    }

   public function store(Request $request)
   {
        $validated = $request->validate([
            'title'  => 'required|string|min:3|max:255|unique:books,title',
            'author' => ['required', 'string', 'max:255', 'regex:/^[\pL\s\.\,\-\']+$/u'],
            'year'   => 'required|integer|digits:4|min:1990|max:' . date('Y'),
            'stock'  => 'required|integer|min:0|max:1000',
            'category_id' => ['required','exists:categories,id'],
        ], [
            'title.min'       => 'Judul buku minimal 3 karakter.',
            'title.unique'    => 'Judul buku ini sudah terdaftar.',
            'author.regex'    => 'Nama penulis hanya boleh berisi huruf, spasi, titik, koma, dan tanda hubung.',
            'year.digits'     => 'Tahun terbit harus 4 digit.',
            'year.max'        => 'Tahun terbit tidak boleh lebih dari tahun ' . date('Y') . '.',
            'stock.max'       => 'Stok buku maksimal 1000.',
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
        $categories = Category::orderBy('name')->get();
        return view('books.edit', compact('title', 'book', 'categories'));
    }

    public function update(Request $request, Book $book)
    {
        $validated = $request->validate([
            'title'  => ['required', 'string', 'min:3', 'max:255',
                        Rule::unique('books', 'title')->ignore($book->id)],
            'author' => ['required', 'string', 'max:255', 'regex:/^[\pL\s\.\,\-\']+$/u'],
            'year'   => 'required|integer|digits:4|min:1990|max:' . date('Y'),
            'stock'  => 'required|integer|min:0|max:1000',
            'category_id' => 'required|exists:categories,id',
        ], [
            'title.min'       => 'Judul buku minimal 3 karakter.',
            'title.unique'    => 'Judul buku ini sudah terdaftar.',
            'author.regex'    => 'Nama penulis hanya boleh berisi huruf, spasi, titik, koma, dan tanda hubung.',
            'year.digits'     => 'Tahun terbit harus 4 digit.',
            'year.max'        => 'Tahun terbit tidak boleh lebih dari tahun ' . date('Y') . '.',
            'stock.max'       => 'Stok buku maksimal 1000.',
        ]);
    
        $book->update($validated);

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