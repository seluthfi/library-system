<?php

namespace App\Http\Controllers;

use App\Models\Category;

class CategoryController extends Controller
{
    public function index()
    {
        $title = 'Kategori Buku';
        $categories = Category::withCount('books')->orderBy('name')->get();

        return view('categories.index', compact('title', 'categories'));
    }
}
