<?php

use App\Models\Book;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
});
//Route::get('/login', function () {
//    return view('login');
//});
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
Route::middleware('auth:api')->group(function () {
    Route::apiResource('category-books', \App\Http\Controllers\CategoryBooksController::class);
    Route::apiResource('books', \App\Http\Controllers\BooksController::class);
    Route::apiResource('myBooks', \App\Http\Controllers\MyBooksController::class);
    Route::apiResource('favoriteBooks', \App\Http\Controllers\FavorateBooksController::class);
});
//Route::middleware('auth:api')->get('/user', function (Request $request) {
//    return $request->user();
//});
Route::post('/login', [\App\Http\Controllers\API\AuthController::class, 'login']);
Route::middleware('auth:api')->group(function () {
    Route::get('/profile', [\App\Http\Controllers\API\AuthController::class, 'profile']);
    // other protected routes here
});
// Protected route using Passport token
Route::post('/register', [\App\Http\Controllers\API\AuthController::class, 'register']);
Route::middleware('auth:api')->post('/logout', [\App\Http\Controllers\API\AuthController::class, 'logout']);
//Auth::routes();
Route::fallback(function () {
    return redirect('/'); // or return view('home');
});
