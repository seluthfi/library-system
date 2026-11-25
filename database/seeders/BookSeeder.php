<?php

namespace Database\Seeders;

use App\Models\Book;
use App\Models\Category;
use Illuminate\Database\Seeder;

class BookSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $pemrogramanId = Category::where('name', 'Pemrograman')->first()?->id;
        $basisDataId = Category::where('name', 'Basis Data')->first()?->id;
        $algoritmaId = Category::where('name', 'Algoritma')->first()?->id;

        Book::create([
            'title' => 'Pemrograman PHP',
            'author' => 'Luthfi',
            'year' => 2024,
            'stock' => 5,
            'category_id' => $pemrogramanId,
        ]);

        Book::create([
            'title' => 'Laravel untuk Pemula',
            'author' => 'Rizqi',
            'year' => 2023,
            'stock' => 8,
            'category_id' => $pemrogramanId,
        ]);

        Book::create([
            'title' => 'Big Data',
            'author' => 'Rahman',
            'year' => 2025,
            'stock' => 10,
            'category_id' => $basisDataId,
        ]);

        Book::create([
            'title' => 'Algoritma dan Pemrograman',
            'author' => 'Juneo',
            'year' => 2024,
            'stock' => 7,
            'category_id' => $algoritmaId,
        ]);

        Book::create([
            'title' => 'Pemrograman Berorientasi Objek',
            'author' => 'Zhilan',
            'year' => 2024,
            'stock' => 6,
            'category_id' => $pemrogramanId,
        ]);
    }
}
