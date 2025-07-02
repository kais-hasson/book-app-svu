<?php

use App\Models\Book;
use App\Models\Category_book;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Log;

Route::post('/livewire/upload-file', function () {
    Log::info('Upload File Cookies', request()->cookies->all());
    abort(401, 'Debugging 401');
});
Route::fallback(function () {
    return redirect('/admin'); // or return view('home');
});
