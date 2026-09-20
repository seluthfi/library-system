<?php

namespace App\Http\Controllers;

class BookController extends Controller
{
    public function index()
    {
        $title = "Daftar Buku";
        $description = "Daftar buku yang tersedia di perpustakaan.";

        $books = [
            [
                'title' => 'Pemrograman PHP',
                'author' => 'Andi',
                'year' => 2023
            ],
            [
                'title' => 'Laravel untuk Pemula',
                'author' => 'Budi',
                'year' => 2024
            ],
            [
                'title' => 'Basis Data',
                'author' => 'Citra',
                'year' => 2022
            ],
            [
                'title' => 'Algoritma dan Pemrograman',
                'author' => 'Dewi',
                'year' => 2023
            ],
            [
                'title' => 'Pemrograman Berorientasi Objek',
                'author' => 'Eko',
                'year' => 2024
            ]
        ];

        return view('books.index', compact('title', 'description', 'books'));
    }

    public function show($id)
    {
        $books = [
            1 => [
                'title' => 'Pemrograman PHP',
                'author' => 'Andi',
                'year' => 2023
            ],
            2 => [
                'title' => 'Laravel untuk Pemula',
                'author' => 'Budi',
                'year' => 2024
            ],
            3 => [
                'title' => 'Basis Data',
                'author' => 'Citra',
                'year' => 2022
            ],
            4 => [
                'title' => 'Algoritma dan Pemrograman',
                'author' => 'Dewi',
                'year' => 2023
            ],
            5 => [
                'title' => 'Pemrograman Berorientasi Objek',
                'author' => 'Eko',
                'year' => 2024
            ]
        ];

        $book = $books[$id] ?? null;

        return view('books.show', compact('id', 'book'));
    }
}