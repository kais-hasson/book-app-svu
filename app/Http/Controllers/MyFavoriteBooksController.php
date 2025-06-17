<?php

namespace App\Http\Controllers;

use App\Models\My_favorite_book;
use App\Http\Requests\Storemy_favorite_booksRequest;
use App\Http\Requests\Updatemy_favorite_booksRequest;

class MyFavoriteBooksController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $my_favorite_books = My_favorite_book::all();
        return Response()->json(["data" => $my_favorite_books, "status" => 200]);
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
    public function store(Storemy_favorite_booksRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(My_favorite_book $my_favorite_books)
    {
        //
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
