<?php

namespace App\Http\Controllers;

use App\Models\Club;
use Illuminate\Http\Request;

class ClubController extends Controller
{
    public function index()
    {
        $clubs = Club::all();

        return response()->json([
            'clubs' => $clubs
        ], 200);
    }

    public function show($id)
    {
        $club = Club::findOrFail($id)->first();

        return response()->json([
            'club' => $club
        ], 200);
    }

    public function store(Request $request)
    {
        try {
            $request->validate([
                'name' => 'required|min:5',
                'description' => 'required|max:255'
            ]);

            $club = Club::create($request->all());

            return response()->json([
                'club' => $club
            ], 201);
        } catch (\Exception $e) {
            return response()->json([
                'error' => 'Error: ' . $e->getMessage()
            ], 500);
        }
    }

    public function update(Request $request, $id)
    {
        try {
            $request->validate([
                'name' => 'nullable|min:5',
                'description' => 'nullable|string|max:255'
            ]);

            $club = Club::findOrFail($id);

            $club->update($request->all());

            return response()->json([
                'club' => $club
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'error' => 'Error: ' . $e->getMessage()
            ], 500);
        }
    }
    public function destroy($id)
    {

        $club = Club::findOrFail($id);
        $club->delete();

        return response()->json([
            'message' => 'Club deleted successfully',
        ], 200);
    }
}
