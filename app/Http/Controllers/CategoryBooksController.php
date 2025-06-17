<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Category_book;
use App\Http\Requests\Updatecategory_booksRequest;
use Illuminate\Http\Request;

class CategoryBooksController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $catigories = Category_book::all();
        return Response()->json(["data" => $catigories, "status" => 200]);
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
        $request->validate([
            'category_Name' => 'required',
        ]);
        $catigories = new Category_book();
        $catigories->category_Name = $request->input('category_Name');
        $catigories->save();
        return Response()->json(["data" => $catigories, "status" => 200]);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $category_book = Category_book::find($id);

        if (!$category_book) {
            return response()->json([
                'message' => 'Category Book not found.',
                'code' => 404,
            ], 404);
        }

        return response()->json($category_book);
    }
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category_book $category_books)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Category_book $category_books)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category_book $category_books)
    {
        //
    }
}
