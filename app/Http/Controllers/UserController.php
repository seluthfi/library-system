<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    public function index() {
        $title = 'Kelola Pengguna';
        $users = User::orderBy('name')->get();

        return view('users.index', compact('title', 'users'));
    }
}
