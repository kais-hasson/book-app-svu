<?php

namespace App\Http\Controllers;

use App\Models\My_book;
use App\Http\Requests\Storemy_booksRequest;
use App\Http\Requests\Updatemy_booksRequest;

class MyBooksController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $my_books = My_book::all();
        return Response()->json(["data" => $my_books, "status" => 200]);
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
    public function store(Storemy_booksRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(My_book $my_books)
    {
        //
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
    public function destroy(My_book $my_books)
    {
        //
    }
}
