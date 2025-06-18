<?php

use App\Models\Book;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
});
Route::get('/login', function () {
    return view('login');
});
Route::get('/books', function () {
    $books = Book::all();
    return view('books',['books'=>$books]);
});

//Route::controller(\App\Http\Controllers\CategoryBooksController::class)->group(function () {
//    Route::get('/category-books', 'index');
//    Route::post('/category-books', 'store');
//});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
//Auth::routes(['verify' => true]);
Route::fallback(function () {
    return redirect('/'); // or return view('home');
});
