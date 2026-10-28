<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Category;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $names = ['Pemograman', 'Basis Data', 'Jaringan Komputer', 'Sistem Informasi', 'Algoritma'];
        foreach ($names as $name) {
            Category::create(['name' => $name]);
        }
    }

    // public function create()
    // {
    //     $categories = Category::orderBy('name')->get();

    //     return view('books.create', compact('categories'));
    // }
}
