<?php

namespace App\Http\Controllers;

use App\Models\Enrollment;
use Illuminate\Http\Request;

class EnrollmentController extends Controller
{
    public function index()
    {
        $enrollments = Enrollment::all();

        return response()->json(['enrollment' => $enrollments], 200);
    }

    public function store(Request $request)
    {
        try {

            $request->validate([
                'student_id' => 'required|exists:students,id',
                'course_name' => 'required|max:255',
                'enrollment_date' => 'required|date',
            ]);

            $enrollment = Enrollment::create([
                'student_id' => $request->student_id,
                'course_name' => $request->course_name,
                'enrollment_date' => $request->enrollment_date,
            ]);

            return response()->json([
                'message' => 'Enrollment created successfully',
                'enrollment' => $enrollment,
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

            $enrollment = Enrollment::findOrFail($id);

            $request->validate([
                'course_name' => 'nullable|string|max:255',
                'enrollment_date' => 'nullable|date',
            ]);

            $enrollment->update($request->all());

            return response()->json([
                'message' => 'Enrollment updated successfully',
                'enrollment' => $enrollment,
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'error' => 'Lỗi: ' . $e->getMessage()
            ], 500);
        }
    }

    public function destroy($id)
    {
        $enrollment = Enrollment::findOrFail($id);
        $enrollment->delete();

        return response()->json([
            'message' => 'Enrollment deleted successfully',
        ], 200);
    }
}
