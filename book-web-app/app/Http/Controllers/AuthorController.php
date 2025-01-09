<?php

namespace App\Http\Controllers;

use App\Http\Requests\Author\CreateAuthorRequest;
use App\Http\Requests\Author\UpdateAuthorRequest;
use App\Models\Author;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $authors = Author::with('books')->withTrashed()->get();

        return response()->json([
            'message' => 'Loaded successfully.',
            'data' => $authors,
        ], 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CreateAuthorRequest $request)
    {
        $author = Author::create([
            'user_id' => Auth::id(),
            'pen_name' => $request->input('pen_name'),
        ]);

        return response()->json([
            'message' => 'Created successfully.',
            'data' => $author,
        ], 200);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateAuthorRequest $request, string $id)
    {
        $author = Author::findOrFail($id);
        $author->pen_name = $request->input('pen_name');
        $author->save();

        return response()->json([
            'message' => 'Updated successfully.',
            'data' => $author,
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $author = Author::findOrFail($id);
        $author->delete();

        return response()->json([
            'message' => 'Deleted successfully.',
        ], 200);
    }
}
