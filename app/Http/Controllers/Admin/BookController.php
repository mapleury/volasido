<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Books;
use App\Models\Category;
use Illuminate\Http\Request;

class BookController extends Controller
{
    public function index()
    {
        $books = Books::paginate(5);
        return view('admin.book.index', compact('books'));
    }


    public function create()
    {
        $categories = Category::all();
        return view('admin.book.create', compact('categories'));
    }


    public function store(Request $request)
    {
        //Validasi data
        $this->validateBook($request);

        //menyimpan si cover
        $coverImage = $request->file('cover');
        $coverImageName = time() . "." . $coverImage->getClientOriginalExtension();
        $coverImage->move(public_path('cover_images'), $coverImageName);

        Books::create([
            'title' => $request->title,
            'author' => $request->author,
            'publisher' => $request->publisher,
            'year' => $request->year,
            'stock' => $request->stock,
            'cover' => 'cover_images/' . $coverImageName,
            'category_id' => $request->category_id
        ]);

        return redirect()->route('book')->with('message', "Berhasil menambahkan data buku");
    }

    public function detail($id)
    {
        $book = Books::find($id);
        return view('admin.book.detail', compact('book'));
    }

    public function edit($id)
    {
        $book = Books::findOrFail($id);
        $categories = Category::all();
        return view('admin.book.edit', compact('book', 'categories'));
    }



    public function update(Request $request, $id)
    {
        $this->validateBook($request);

        $book = Books::findOrFail($id);

        $book->title = $request->title;
        $book->author = $request->author;
        $book->publisher = $request->publisher;
        $book->year = $request->year;
        $book->stock = $request->stock;
        $book->category_id = $request->category_id;

        if ($request->hasFile('cover')) {
            $coverImage = $request->file('cover');
            $coverImageName = time() . "." . $coverImage->getClientOriginalExtension();
            $coverImage->move(public_path('cover_images'), $coverImageName);
            $book->cover = 'cover_images/' . $coverImageName; 
        }
        $book->save();

        return redirect()->route('book')->with('message', 'Data buku berhasil diperbarui');
    }

    public function destroy($id)
    {
        $book = Books::findOrFail($id);

        if($book->cover && file_exists(public_path($book->cover))) {
            unlink(public_path($book->cover));
        }

        $book->delete();
        return redirect()->route('book')->with('message', 'Data buku berhasil dihapus');
    }



    public function validateBook(Request $request)
    {
        //syaratnya validasi
        $rules = [
            'title'  => 'required|string|max:255',
            'author'  => 'required|string|max:255',
            'year'  => 'required|numeric',
            'publisher'  => 'required|string|max:255',
            'stock'  => 'required|numeric',
            'category_id'  => 'required|numeric'
        ];

       
        if($request->isMethod('post')) {
            $rules['cover'] = 'required|image|mimes:jpeg,png,jpg|max:2084';
        }else {
            $rules['cover'] = 'nullable|image|mimes:jpeg,png,jpg|max:2084';
        }

        $request->validate($rules);

    }
}
