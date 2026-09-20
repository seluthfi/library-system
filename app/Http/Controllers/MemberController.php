<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MemberController extends Controller
{
    public function index()
    {
        $members = [
            'Muhammad Luthfi Ramadhan',
            'Muhammad Syifaaur Rahman',
            'Muhammad Sayyid Zhilan Hifzhullah',
            'Muhammad Zaki Riyanto',
            'Muhammad Rizqi Rahmatullah'
        ];
        return view('members.index', compact('members'));
    }
}
