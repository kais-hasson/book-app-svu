<?php

use App\Models\Book;
use App\Models\Category_book;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
});
Route::get('/login', function () {
    return view('../auth/login');
});

    Route::get('/get_category_books', function () {
        $categoryBooks = Category_book::all();
        return view('categoryBooks',['categoryBooks'=>$categoryBooks]);
    });
    Route::get('/get_books', function () {
        $books = Book::all();
        return view('books',['books'=>$books]);
    });
    Route::get('/get_users', [\App\Http\Controllers\API\AuthController::class, 'users']);
    Route::get('/get_roles', function () {
        $roles= \App\Models\Roles::withCount('user')->get();;
        return view('roles',['roles'=>$roles]);


    });


//    Route::get('/books', function () {
//        $books = Book::all();
//
//
//    });
//Route::get('/users', function () {
//    $users= \App\Models\User::('myBooks')->get();
//    return view('users',['users'=>$users]);
//});

    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//Route::apiResource('category-books', \App\Http\Controllers\CategoryBooksController::class);
//Route::apiResource('books', \App\Http\Controllers\BooksController::class);
//Route::apiResource('myBooks', \App\Http\Controllers\MyBooksController::class);
//Route::apiResource('favoriteBooks', \App\Http\Controllers\FavorateBooksController::class);
//Route::apiResource('roles', \App\Http\Controllers\RolesController::class);
Route::post('/logout', [\App\Http\Controllers\Auth\LoginController::class, 'logout'])->name('logout');
//Route::controller(\App\Http\Controllers\CategoryBooksController::class)->group(function () {
//    Route::get('/category-books', 'index');
//    Route::post('/category-books', 'store');
//});

Route::post('/login',   [\App\Http\Controllers\API\AuthController::class, 'login'])->name('login');

//    if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
//        $token = Auth::user()->createToken('Token')->accessToken;
//        return response()->json(['token' => $token]);
//    }
//
//    return response()->json(['error' => 'Invalid credentials'], 401);
//});

//Auth::routes(['verify' => true]);
Route::fallback(function () {
    return redirect('/'); // or return view('home');
});
