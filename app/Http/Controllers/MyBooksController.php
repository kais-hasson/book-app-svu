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
    public function finishedBooks()
    {
        $myBooks = Auth::user()->myBooks()->where('isFinished',true)->with('book')->get();

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
        ]);


        $myBook = Auth::user()->myBooks()->create([
            'book_id' => $request->book_id,
            'current_Page' =>0,
            'isFinished' => 0,
        ]);

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
    public function update(Request $request, $id)
    {

        // Get only this user's book
        $myBook = Auth::user()->myBooks()->findOrFail($id);
        if ($request->has('current_Page')) {
            $myBook->current_Page = $request->current_Page;
        }

        if ($request->has('isFinished')) {
            $myBook->isFinished = $request->isFinished;
        }
        // Apply validated changes
        $myBook->save();
        return response()->json([
            'data' => $myBook,
            'message' => 'Book progress updated',
            'status' => 200,
        ]);
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
