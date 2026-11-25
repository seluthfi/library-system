<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Borrowing;
use App\Models\Member;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BorrowingController extends Controller
{
    public function index()
    {
        $title = 'Daftar Peminjaman';
        $borrowings = Borrowing::with(['member', 'user', 'details.book'])
            ->latest()
            ->get();

        return view('borrowings.index', compact('title', 'borrowings'));
    }

    public function create()
    {
        $title = 'Tambah Peminjaman';
        $members = Member::orderBy('name')->get();
        $books = Book::where('stock', '>', 0)->orderBy('title')->get();

        return view('borrowings.create', compact('title', 'members', 'books'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'member_id' => 'required|exists:members,id',
            'books' => 'required|array',
        ], [
            'member_id.required' => 'Anggota harus dipilih.',
            'member_id.exists' => 'Anggota harus dipilih.',
            'books.required' => 'Pilih minimal satu buku.',
            'books.array' => 'Format buku tidak valid.',
        ]);

        $selectedBooks = [];
        foreach ($validated['books'] as $bookId => $quantity) {
            if ((int) $quantity > 0) {
                if (! is_numeric($quantity) || (int) $quantity != $quantity || (int) $quantity < 1) {
                    return back()
                        ->withErrors(['books' => 'Jumlah buku harus berupa angka minimal 1.'])
                        ->withInput();
                }

                $selectedBooks[$bookId] = (int) $quantity;
            }
        }

        if (empty($selectedBooks)) {
            return back()
                ->withErrors(['books' => 'Pilih minimal satu buku.'])
                ->withInput();
        }

        $booksToBorrow = [];
        foreach ($selectedBooks as $bookId => $quantity) {
            $book = Book::findOrFail($bookId);

            if ($book->stock <= 0) {
                return back()
                    ->withErrors(['books' => "Stok buku {$book->title} habis."])
                    ->withInput();
            }

            if ($quantity > $book->stock) {
                return back()
                    ->withErrors(['books' => "Stok buku {$book->title} tidak mencukupi."])
                    ->withInput();
            }

            $booksToBorrow[] = [
                'book' => $book,
                'quantity' => $quantity,
            ];
        }

        DB::transaction(function () use ($validated, $booksToBorrow) {
            $borrowing = Borrowing::create([
                'user_id' => auth()->id(),
                'member_id' => $validated['member_id'],
                'borrowing_date' => now()->toDateString(),
                'due_date' => now()->addDays(7)->toDateString(),
                'status' => 'borrowed',
            ]);

            foreach ($booksToBorrow as $item) {
                $borrowing->details()->create([
                    'book_id' => $item['book']->id,
                    'quantity' => $item['quantity'],
                ]);

                $item['book']->decrement('stock', $item['quantity']);
            }
        });

        return redirect()->route('borrowings.index')
            ->with('success', 'Transaksi peminjaman berhasil disimpan.');
    }

    public function return(Borrowing $borrowing)
    {
        if ($borrowing->status !== 'borrowed') {
            return back()->withErrors(['status' => 'Transaksi ini sudah dikembalikan.']);
        }

        DB::transaction(function () use ($borrowing) {
            $borrowing->update([
                'return_date' => now()->toDateString(),
                'status' => 'returned',
            ]);

            foreach ($borrowing->details as $detail) {
                $detail->book->increment('stock', $detail->quantity);
            }
        });

        return redirect()->route('borrowings.index')
            ->with('success', 'Transaksi pengembalian berhasil disimpan.');
    }
}
