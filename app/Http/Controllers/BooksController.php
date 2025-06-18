<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;

class BooksController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = Book::query();

        // Optional filter by category
        if ($request->has('category_book_id')) {
            $query->where('category_book_id', $request->category_book_id);
        }

        // Optional filter by book ID
        if ($request->has('book_id')) {
            $query->where('id', $request->book_id);
        }

        // Eager load related category
        $books = $query->with('category')->get();

        return response()->json([
            'data' => $books,
            'status' => 200,
        ]);
    }

    public function show($id)
    {
        $book = Book::with('category')->find($id);

        if (! $book) {
            return response()->json([
                'message' => 'Book not found.',
                'code' => 404,
            ], 404);
        }

        return response()->json([
            'data' => $book,
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
       $fields= $request->validate([
            'name'=> 'required',
            'path'=> 'required',
            'rate'=> 'required',
            'cover_Img'=> 'required',
            'writer'=> 'required',
            'category_book_id'=>'required',
            'description'=> 'required',
            'status'=> 'required',
        ]);
       $book=Book::create($fields);
//        $book = new Book();
//        $book->name = $request->input('name');
//        $book->path = $request->input('path');
//        $book->rate = $request->input('rate');
//        $book->cover_Img = $request->input('cover_Img');
//        $book->writer = $request->input('description');
//        $book->status = $request->input('status');
//        $book->save();

        return Response()->json(["data" => $book, "status" => 200]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Book $books)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Book $books)
    {
        $fields= $request->validate([
            'name'=> 'required',
            'path'=> 'required',
            'rate'=> 'required',
            'cover_Img'=> 'required',
            'writer'=> 'required',
            'description'=> 'required',
            'status'=> 'required',
        ]);
        $books->update($fields);
        return Response()->json(["data" => $books, "status" => 200]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Book $books)
    {
        //
    }
}
