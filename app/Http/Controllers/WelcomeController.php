<?php

namespace App\Http\Controllers;

use App\Models\Books;
use App\Models\Category;
use Illuminate\Http\Request;

class WelcomeController extends Controller
{
  public function welcome() {
    $books = Books::latest()->take(4)->get();
    $categories = Category::all();
    return view('welcome', compact('books', 'categories'));
  }
}
