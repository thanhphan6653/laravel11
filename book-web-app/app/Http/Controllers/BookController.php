<?php

namespace App\Http\Controllers;

use App\Http\Requests\Book\CreateBookRequest;
use App\Http\Requests\Book\UpdateBookRequest;
use App\Models\Book;
use Illuminate\Http\Request;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $books = Book::with(['author', 'genre'])->withTrashed()->paginate(5);

        return response()->json([
            'message' => 'Loaded successfully.',
            'data' => $books,
        ], 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CreateBookRequest $request)
    {
        $coverImage = $request->file('cover_image');

        $book = Book::create([
            'author_id' => $request->input('author_id'),
            'genre_id' => $request->input('genre_id'),
            'name_book' => $request->input('name_book'),
            'cover_image' => $coverImage->store('images', 'public'),
            'description' => $request->input('description'),
        ]);

        return response()->json([
            'message' => 'Created successfully.',
            'data' => $book,
        ], 200);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $book = Book::with('chapters')->findOrFail($id);

        return response()->json([
            'message' => 'Showed successfully.',
            'data' => $book,
        ], 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateBookRequest $request, string $id)
    {
        $book = Book::findOrFail($id);
        $coverImage = $request->file('cover_image');

        $book->author_id = $request->input('author_id');
        $book->genre_id = $request->input('genre_id');
        $book->name_book = $request->input('name_book');
        $book->cover_image = $coverImage->store('images', 'public');
        $book->description = $request->input('description');

        $book->save();

        return response()->json([
            'message' => 'Updated successfully.',
            'data' => $book,
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $book = Book::findOrFail($id);
        $book->delete();

        return response()->json([
            'message' => 'Deleted successfully.',
        ], 200);
    }
}
