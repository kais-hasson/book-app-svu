<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Category_book;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

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
        $books = $query->with('category')->orderBy('created_at', 'desc')->get();
        $recommended=$books->where('rate',5);
        return response()->json([
            'data' => [
                'recommended'=>[...$recommended],
                'newBooks'=>$books->take(5),
                'all'=>$books,
            ],
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
            'name'=> 'required|string',
            'pdf_file'=> 'required',
            'rate'=> 'required|integer|min:1|max:5',
            'cover_Img'=> 'required',
            'writer'=> 'required|string',
            'category_book_id'=>'required|integer|exists:category_books,id',
            'description'=> 'required',
            'language'=> 'required',
        ]);
        $pdfPath = $request->file('pdf_file')->store('books', 'public');
        $imgPath = $request->file('cover_Img')->store('img', 'public');
        $pdffullUrl = Storage::url($pdfPath); // returns: /storage/books/filename.pdf
        $pdffullPath = asset($pdffullUrl); // returns: http://yourdomain.com/storage/books/filename.pdf
        $imgfullUrl = Storage::url($imgPath); // returns: /storage/books/filename.pdf
        $imgfullPath = asset($imgfullUrl); // returns: http://yourdomain.com/storage/books/filename.pdf
       $book=Book::create([
            'name' => $request->name,
            'rate' => $request->rate,
            'cover_Img' => $imgfullPath,
            'category_book_id' => $request->category_book_id,
            'description' => $request->description,
            'writer' => $request->writer,
            'language' => $request->language,
            'path' => $pdffullPath, // like "books/myfile.pdf"
        ]);
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
