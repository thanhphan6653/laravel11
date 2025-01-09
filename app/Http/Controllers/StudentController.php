<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function index()
    {
        $students = Student::all();

        return response()->json([
            'students' => $students
        ], 200);
    }

    public function show($id)
    {
        $student = Student::findOrFail($id);

        return response()->json([
            'student' => $student
        ], 200);
    }

    public function store(Request $request)
    {
        try {
            $request->validate([
                'name' => 'required|string',
                'email' => 'required|email|max:50'
            ]);

            $student = Student::create([
                'name' => $request->name,
                'email' => $request->email
            ]);

            return response()->json([
                'student' => $student
            ], 201);
        } catch (\Exception $e) {
            return response()->json([
                'error' => 'Lỗi: ' . $e->getMessage()
            ], 500);
        }
    }

    public function update(Request $request, $id)
    {
        try {
            $request->validate([
                'name' => 'nullable|string|min:5',
                'email' => 'nullable|email'
            ]);

            $student = Student::findOrFail($id);

            $student->update($request->all());

            return response()->json([
                'student' => $student
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'error' => 'Lỗi: ' . $e->getMessage()
            ], 500);
        }
    }

    public function destroy($id)
    {
        $student = Student::findOrFail($id);

        $student->delete();

        return response()->json([
            'message' => 'Student deleted successfully'
        ], 200);
    }
}
