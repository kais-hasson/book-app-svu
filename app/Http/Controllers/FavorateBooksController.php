<?php

namespace App\Http\Controllers;

use App\Http\Requests\Updatefavorite_BooksRequest;
use App\Models\favorate_books;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class FavorateBooksController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $favoriteBooks = Auth::user()->favoriteBooks()->with('book')->get();

        return response()->json([
            'data' => $favoriteBooks,
            'status' => 200,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'book_id' => 'required|exists:books,id',
        ]);

        $user = Auth::user();

        // Check if the book is already in favorites
        $existing = $user->favoriteBooks()->where('book_id', $validated['book_id'])->first();

        if ($existing) {
            // If exists, remove it (toggle off)
            $existing->delete();

            return response()->json([
                'message' => 'Book removed from favorites.',
                'status' => 200,
            ]);
        } else {
            // If not exists, add it (toggle on)
            $favorite = $user->favoriteBooks()->create([
                'book_id' => $validated['book_id'],
            ]);

            return response()->json([
                'message' => 'Book added to favorites.',
                'data' => $favorite->with('book')->first(),
                'status' => 201,
            ]);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $favoriteBooks = Auth::user()->favoriteBooks()->with('book')->findOrFail($id);

        return response()->json([
            'data' => $favoriteBooks,
            'status' => 200,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Updatefavorite_BooksRequest $request, favorate_books $favorite_Books)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(favorate_books $favorite_Books)
    {
        //
    }
}
