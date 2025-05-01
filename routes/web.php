<?php

use App\Http\Controllers\Admin\BookController;
use App\Http\Controllers\Admin\BorrowingController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\DashboardAdminController;
use App\Http\Controllers\Student\DashboardStudentController;
use App\Http\Controllers\WelcomeController;
use App\Http\Middleware\AdminMiddleware;
use App\Models\Category;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });

Route::controller(WelcomeController::class)->group(function(){
    Route::get('/', 'welcome')->name('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


//Admin
Route::prefix('admin')->middleware('auth', AdminMiddleware::class)->group(function() {
    Route::controller(DashboardAdminController::class)->group(function() {
        Route::get('/dashboard', 'index')->name('admin.dashboard');
    });

    //CRUD Category
    Route::controller(CategoryController::class)->group(function() {
        Route::get('/category', 'index')->name('category');
        Route::post('/category/store', 'store')->name('category.store');
        Route::post('admin/category/delete/{id}', [CategoryController::class, 'destroy'])->name('category.delete');
        Route::put('/admin/category/update/{id}', [CategoryController::class, 'update'])->name('category.update');
    });

    //CRUD Books
    Route::controller(BookController::class)->group(function() {
        Route::get('/book', 'index')->name('book');
        Route::get('/books/create', 'create')->name('books.create');
        Route::post('/books/store', 'store')->name('books.store');
        Route::get('/books/{id}', 'detail')->name('books.detail'); //detail data
        Route::get('/books/edit/{id}', 'edit')->name('books.edit'); //edit data
        Route::put('admin/books/update/{id}', [BookController::class, 'update'])->name('books.update');
        Route::delete('admin/books/destroy/{id}', [BookController::class, 'destroy'])->name('books.destroy'); //menghapus data
      
    });

     //CRUD Borrowing
     Route::controller(BorrowingController::class)->group(function() {
        Route::get('/borrowing/unreturned', 'borrowingUnreturned')->name('borrowing.unreturned');
        Route::put('/borrowing/{id}/return', 'returnBook')->name('borrowing.return');
        Route::get('/borrowing/returned', 'borrowingReturned')->name('borrowing.returned');
        Route::get('/borrowing/all', 'borrowingAll')->name('borrowing.all');
        
      
    });
});


//Student
Route::prefix('student')->middleware('auth')->group(function() {
    Route::controller(DashboardStudentController::class)->group(function() {
        Route::get('/dashboard', 'index')->name('student.dashboard');
        Route::get('/show/book/{id}', 'show')->name('student.book.show');
        Route::post('/borrow/book/{id}', 'borrow')->name('student.borrow');
        Route::get('/borrow/book/all', 'borrowedBooks')->name('student.borrow.all');

        Route::get('/all/books', 'allbooks')->name('student.all.books');
    });
});

