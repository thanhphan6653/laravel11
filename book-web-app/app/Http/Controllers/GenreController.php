<?php

namespace App\Http\Controllers;

use App\Http\Requests\Genre\CreateGenreRequest;
use App\Http\Requests\Genre\UpdateGenreRequest;
use App\Models\Genre;
use Illuminate\Http\Request;

class GenreController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $genres = Genre::with('books')->withTrashed()->get();

        return response()->json([
            'message' => 'Loaded successfully.',
            'data' => $genres,
        ], 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CreateGenreRequest $request)
    {
        $genre = Genre::create([
            'name_genre' => $request->input('name_genre'),
        ]);

        return response()->json([
            'message' => 'Created successfully.',
            'data' => $genre,
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
    public function update(UpdateGenreRequest $request, string $id)
    {
        $genre = Genre::findOrFail($id);
        $genre->name_genre = $request->input('name_genre');
        $genre->save();

        return response()->json([
            'message' => 'Updated successfully.',
            'data' => $genre,
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $genre = Genre::findOrFail($id);
        $genre->delete();

        return response()->json([
            'message' => 'Deleted successfully.',
        ], 200);
    }
}
