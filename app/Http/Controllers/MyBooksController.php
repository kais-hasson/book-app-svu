<?php

namespace App\Http\Controllers;

use App\Models\My_book;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class MyBooksController extends Controller
{
    /**
     * Display a listing of the resource.
     */
//    public function index()
//    {
//        $my_books = My_book::all();
//        return Response()->json(["data" => $my_books, "status" => 200]);
//    }
    public function index()
    {
        $myBooks = Auth::user()->myBooks()->with('book')->get();

        return response()->json([
            'data' => $myBooks,
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
            'current_Page' => 'nullable|integer',
            'isFinished' => 'boolean',
        ]);

        $myBook = Auth::user()->myBooks()->create($validated);

        return response()->json([
            'data' => $myBook,
            'status' => 201,
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $myBook = Auth::user()->myBooks()->with('book')->findOrFail($id);

        return response()->json([
            'data' => $myBook,
            'status' => 200,
        ]);
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(My_book $my_books)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Updatemy_booksRequest $request, My_book $my_books)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $myBook = Auth::user()->myBooks()->findOrFail($id);
        $myBook->delete();

        return response()->json([
            'message' => 'Deleted successfully',
            'status' => 200,
        ]);
    }
}
