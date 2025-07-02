<?php

use App\Models\Book;
use App\Models\Category_book;
use Illuminate\Support\Facades\Route;


Route::post('/test-session', function () {
    return response()->json([
        'auth' => auth()->check(),
        'user' => auth()->user(),
        'session' => session()->all(),
    ]);
});
Route::fallback(function () {
    return redirect('/admin'); // or return view('home');
});
