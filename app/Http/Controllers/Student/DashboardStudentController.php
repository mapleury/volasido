<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use App\Models\Books;
use App\Models\Borrow;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardStudentController extends Controller
{
    public function index() {
        $books = Books::latest()->take(6)->get();
        $allBook = Books::all();
        return view('student.landingpage', compact('books', 'allBook'));
}

    public function show($id) {
        $book = Books::findOrfail($id);
        $isAlreadyBorrowed = Borrow::where('book_id', $book->id)
        ->where('user_id', Auth::id())
        ->where('status', 'dipinjam')
        ->exists();

        return view('student.show', compact('book', 'isAlreadyBorrowed'));
    }

    public function borrow(Request $request) {
        $request ->validate([
            'book_id' => 'required|exists:books,id',

        ]);

        $book = Books::findorfail($request -> book_id);
        $book->decrement('stock');
        Borrow::create ([
            'book_id' => $request->book_id,
            'user_id' =>Auth::id(),
            'borrowed_at' =>now(),
            'returned_at' =>now()->addDays(7),
            'status' => 'dipinjam'

        ]);

        return back();



    }

    public function borrowedBooks() {
        $borrowings = Borrow::with('book')
            ->where('user_id', Auth::id())
            ->where('status', 'dipinjam')
            ->get();
    
        return view('student.borrowed-book', compact('borrowings'));
    }
    
    public function allBooks() {
        $categories = Category::with('books')->get();
    
        return view('student.all-books', compact('categories'));
    }
    
}