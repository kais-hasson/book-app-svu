<?php

namespace App\Http\Controllers;

use App\Models\My_favorite_book;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class MyFavoriteBooksController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $favoriteBooks = Auth::user()->favoriteBooks()->with('favoriteBooks')->get();

        return response()->json([
            'data' => $favoriteBooks,
            'status' => 200,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'book_id' => 'required|exists:books,id',
        ]);

        $favoriteBooks = Auth::user()->favoriteBooks()->create($validated);

        return response()->json([
            'data' => $favoriteBooks,
            'status' => 201,
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $favoriteBooks = Auth::user()->favoriteBooks()->with('favoriteBooks')->findOrFail($id);

        return response()->json([
            'data' => $favoriteBooks,
            'status' => 200,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(My_favorite_book $my_favorite_books)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Updatemy_favorite_booksRequest $request, My_favorite_book $my_favorite_books)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(My_favorite_book $my_favorite_books)
    {
        //
    }
}
