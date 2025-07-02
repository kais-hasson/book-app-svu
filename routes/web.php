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
Route::get('/debug-storage', function () {
    return response()->json([
        'symlink_exists' => file_exists(public_path('storage')),
        'symlink_is_link' => is_link(public_path('storage')),
        'symlink_target' => @readlink(public_path('storage')),
        'books_files' => collect(\File::files(storage_path('app/public/books')))->map(function ($file) {
            return $file->getFilename();
        }),
    ]);
});
Route::fallback(function () {
    return redirect('/admin'); // or return view('home');
});
