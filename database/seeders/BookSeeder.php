<?php

namespace Database\Seeders;

use App\Models\Book;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BookSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Book::create([
            'title' => 'Pemrograman PHP',
            'author' => 'Luthfi',
            'year' => 2024,
            'stock' => 5,
        ]);

        Book::create([
            'title' => 'Laravel untuk Pemula',
            'author' => 'Rizqi',
            'year' => 2023,
            'stock' => 8,
        ]);

        Book::create([
            'title' => 'Big Data',
            'author' => 'Rahman',
            'year' => 2025,
            'stock' => 10,
        ]);

        Book::create([
            'title' => 'Algoritma dan Pemrograman',
            'author' => 'Juneo',
            'year' => 2024,
            'stock' => 7,
        ]);

        Book::create([
            'title' => 'Pemrograman Berorientasi Objek',
            'author' => 'Zhilan',
            'year' => 2024,
            'stock' => 6,
        ]);
    }
}
