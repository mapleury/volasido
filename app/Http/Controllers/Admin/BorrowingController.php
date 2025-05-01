<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Borrow;

use Illuminate\Http\Request;

class BorrowingController extends Controller
{
    public function borrowingUnreturned() {
        //ambil data yang statusnya dipinjam
        $borrowings = Borrow::where('status', 'dipinjam')->latest()->paginate(10);

        return view('admin.borrowing.unreturned', compact('borrowings'));
    }

    public function returnBook($id) {
        //ambil data yang statusnya dipinjam

        $borrowings = Borrow::findOrfail($id);
        if($borrowings->status == 'dipinjam') {
            $borrowings->status = 'dikembalikan';
            $borrowings->save();

            //update stock
            $borrowings->book->increment('stock');
            return redirect()->back()->with('message', 'buku berhasil dikembalikan');
        
        }
        return redirect()->back()->with('message', 'Buku sudah dikembalikan sebelumnya');
        return view('admin.borrowing.unreturned', compact('borrowings'));
    }

    public function borrowingReturned() {
        //ambil data yang statusnya dipinjam
        $borrowings = Borrow::where('status', 'dikembalikan')->latest()->paginate(10);

        return view('admin.borrowing.returned', compact('borrowings'));
    }

    public function borrowingAll() {
        //ambil data yang statusnya dipinjam
        $borrowings = Borrow::paginate(10);
        return view('admin.borrowing.all', compact('borrowings'));

    }


}

