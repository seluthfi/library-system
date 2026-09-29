<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;

class BookController extends Controller
{
    public function index()
    {
        $title = "Daftar Buku";
        $description = "Daftar buku yang tersedia di perpustakaan:";

        // $books = [
        //     [
        //         'title' => 'Pemrograman PHP',
        //         'author' => 'Luthfi',
        //         'year' => 2023
        //     ],
        //     [
        //         'title' => 'Laravel untuk Pemula',
        //         'author' => 'Raihan',
        //         'year' => 2024
        //     ],
        //     [
        //         'title' => 'Basis Data',
        //         'author' => 'Zhilan',
        //         'year' => 2022
        //     ],
        //     [
        //         'title' => 'Algoritma dan Pemrograman',
        //         'author' => 'Lukman',
        //         'year' => 2023
        //     ],
        //     [
        //         'title' => 'Pemrograman Berorientasi Objek',
        //         'author' => 'Ali',
        //         'year' => 2024
        //     ]
        // ];

        $books = Book::all();

        return view('books.index', compact('title', 'description', 'books'));
    }

    public function show($id)
    {
        $book = Book::find($id);

        // $books = [
        //     1 => [
        //         'title' => 'Pemrograman PHP',
        //         'author' => 'Luthfi',
        //         'year' => 2023
        //     ],
        //     2 => [
        //         'title' => 'Laravel untuk Pemula',
        //         'author' => 'Raihan',
        //         'year' => 2024
        //     ],
        //     3 => [
        //         'title' => 'Basis Data',
        //         'author' => 'Zhilan',
        //         'year' => 2022
        //     ],
        //     4 => [
        //         'title' => 'Algoritma dan Pemrograman',
        //         'author' => 'Lukman',
        //         'year' => 2023
        //     ],
        //     5 => [
        //         'title' => 'Pemrograman Berorientasi Objek',
        //         'author' => 'Ali',
        //         'year' => 2024
        //     ]
        // ];

        // $book = $books[$id] ?? null;

        return view('books.show', compact('id', 'book'));
    }
}