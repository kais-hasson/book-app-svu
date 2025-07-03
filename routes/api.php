<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\AuthController;

//Route::get('/user', function (Request $request) {
//    return $request->user();
//})->middleware('auth:sanctum');

//Route::controller(\App\Http\Controllers\CategoryBooksController::class)->group(function () {
////    Route::get('/category-books', 'index');
////    Route::post('/category-books', 'store');
//})->middleware('auth:sanctum');
//Route::middleware('auth:api')->group(function () {
//    Route::apiResource('category-books', \App\Http\Controllers\CategoryBooksController::class);
//    Route::apiResource('books', \App\Http\Controllers\BooksController::class);
//    Route::apiResource('myBooks', \App\Http\Controllers\MyBooksController::class);
//    Route::apiResource('myFavoriteBooks', \App\Http\Controllers\MyFavoriteBooksController::class);
//});
Route::middleware('auth:api')->group(function () {
    Route::get('/profile', [AuthController::class, 'profile']);
    Route::get('/Allprofiles', [AuthController::class, 'profiles']);
    Route::post('/change-role', [AuthController::class, 'updateUserRole']);
    Route::get('/finished', [\App\Http\Controllers\MyBooksController::class, 'finishedBooks']);
    // other protected routes here
});
Route::middleware('auth:api')->group(function () {
    Route::apiResource('category-books', \App\Http\Controllers\CategoryBooksController::class);
    Route::apiResource('books', \App\Http\Controllers\BooksController::class);
//    Route::put('/myBooks/{id}', [\App\Http\Controllers\MyBooksController::class, 'update']);
    Route::apiResource('myBooks', \App\Http\Controllers\MyBooksController::class);
    Route::apiResource('favoriteBooks', \App\Http\Controllers\FavorateBooksController::class);
    Route::apiResource('roles', \App\Http\Controllers\RolesController::class);

});

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
Route::post('/login', [AuthController::class, 'login']);

// Protected route using Passport token
Route::post('/register', [AuthController::class, 'register']);
Route::middleware('auth:api')->post('/logout', [\App\Http\Controllers\API\AuthController::class, 'logout']);
//Auth::routes();
Route::fallback(function () {
    return redirect('/'); // or return view('home');
});
