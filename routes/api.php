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
    Route::apiResource('category-books', \App\Http\Controllers\CategoryBooksController::class);
    Route::apiResource('books', \App\Http\Controllers\BooksController::class);
    Route::apiResource('myBooks', \App\Http\Controllers\MyBooksController::class);
    Route::apiResource('myFavoriteBooks', \App\Http\Controllers\MyFavoriteBooksController::class);
});
//Route::middleware('auth:api')->get('/user', function (Request $request) {
//    return $request->user();
//});
Route::post('/login', [AuthController::class, 'login']);
Route::middleware('auth:api')->group(function () {
    Route::get('/profile', [AuthController::class, 'profile']);
    // other protected routes here
});
// Protected route using Passport token
Route::post('/register', [AuthController::class, 'register']);
