<?php

namespace App\Http\Controllers;

use App\Models\my_finished_books;
use App\Http\Requests\Storemy_finished_booksRequest;
use App\Http\Requests\Updatemy_finished_booksRequest;

class MyFinishedBooksController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
    public function store(Storemy_finished_booksRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(my_finished_books $my_finished_books)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(my_finished_books $my_finished_books)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Updatemy_finished_booksRequest $request, my_finished_books $my_finished_books)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(my_finished_books $my_finished_books)
    {
        //
    }
}
