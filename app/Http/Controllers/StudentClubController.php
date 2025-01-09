<?php

namespace App\Http\Controllers;

use App\Models\Club;
use App\Models\Student;
use Illuminate\Http\Request;

class StudentClubController extends Controller
{
    public function store(Request $request)
    {
        try {
            $request->validate([
                'student_id' => 'required|exists:students,id',
                'club_id' => 'required|exists:clubs,id',
            ]);

            $student = Student::findOrFail($request->student_id);
            $club = Club::findOrFail($request->club_id);

            if ($student->clubs->contains($club)) {
                return response()->json(['message' => 'Student is already a member of this club'], 400);
            }

            $student->clubs()->attach($club);

            return response()->json([
                'message' => 'Student successfully joined the club'
            ], 201);
        } catch (\Exception $e) {
            return response()->json([
                'error' => 'Lỗi: ' . $e->getMessage()
            ], 500);
        }
    }

    public function destroy(Request $request)
    {
        $request->validate([
            'student_id' => 'required|exists:students,id',
            'club_id' => 'required|exists:clubs,id',
        ]);

        $student = Student::findOrFail($request->student_id);
        $club = Club::findOrFail($request->club_id);

        $student->clubs()->detach($club);

        return response()->json([
            'message' => 'Student successfully left the club'
        ], 200);
    }
}
