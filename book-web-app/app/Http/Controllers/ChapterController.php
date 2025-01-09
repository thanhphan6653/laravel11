<?php

namespace App\Http\Controllers;

use App\Http\Requests\Chapter\CreateChapterRequest;
use App\Http\Requests\Chapter\UpdateChapterRequest;
use App\Models\Book;
use App\Models\Chapter;
use Illuminate\Http\Request;

class ChapterController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index($id)
    {
        $book = Book::findOrFail($id);
        $chapters = $book->chapters;

        return response()->json([
            'message' => 'Loaded successfully.',
            'data' => $chapters,
        ], 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CreateChapterRequest $request, $id)
    {
        $book = Book::findOrFail($id);

        $chapter = Chapter::create([
            'book_id' => $book->id,
            'title' => $request->input('title'),
            'num_chapter' => $request->input('num_chapter'),
            'content' => $request->input('content'),
        ]);

        return response()->json([
            'message' => 'Created successfully.',
            'data' => $chapter,
        ], 200);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $chapter = Chapter::findOrFail($id);

        return response()->json([
            'message' => 'Showed successfully.',
            'data' => $chapter,
        ], 200);;
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateChapterRequest $request, string $id)
    {
        $chapter = Chapter::findOrFail($id);

        $chapter->title = $request->input('title');
        $chapter->num_chapter = $request->input('num_chapter');
        $chapter->content = $request->input('content');

        $chapter->save();

        return response()->json([
            'message' => 'Updated successfully.',
            'data' => $chapter,
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $chapter = Chapter::findOrFail($id);
        $chapter->delete();

        return response()->json([
            'message' => 'Deleted successfully.',
        ], 200);
    }
}
