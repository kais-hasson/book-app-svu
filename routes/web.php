<?php

use App\Models\Book;
use App\Models\Category_book;
use Illuminate\Support\Facades\Route;

Route::fallback(function () {
    return redirect('/admin'); // or return view('home');
});
