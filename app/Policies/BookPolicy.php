<?php

namespace App\Policies;

use App\Models\Book;
use App\Models\User;

class BookPolicy
{
    /**
     * Boleh melihat daftar buku?
     */
    public function viewAny(User $user): bool
    {
        return in_array($user->role, ['admin', 'petugas'], true);
    }

    /**
     * Boleh melihat detail satu buku?
     */
    public function view(User $user, Book $book): bool
    {
        return in_array($user->role, ['admin', 'petugas'], true);
    }

    /**
     * Boleh menambah buku?
     */
    public function create(User $user): bool
    {
        return in_array($user->role, ['admin', 'petugas'], true);
    }

    /**
     * Boleh mengubah buku?
     */
    public function update(User $user, Book $book): bool
    {
        return in_array($user->role, ['admin', 'petugas'], true);
    }

    /**
     * Boleh menghapus buku?
     */
    public function delete(User $user, Book $book): bool
    {
        return in_array($user->role, ['admin', 'petugas'], true);
    }
}