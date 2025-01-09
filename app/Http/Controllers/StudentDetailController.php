<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;
use PhpParser\Node\Stmt\TryCatch;

class StudentDetailController extends Controller
{
    public function showDetail($id)
    {
        $detail = Student::with('details')->findOrFail($id);

        return response()->json([
            'detail' => $detail
        ], 200);
    }

    public function store(Request $request, $id)
    {
        try {
            $request->validate([
                'address' => 'required|max:255',
                'phone_number' => 'required|string|max:12',
            ]);

            $student = Student::findOrFail($id);

            $student->details()->create([
                'address' => $request->address,
                'phone_number' => $request->phone_number,
                'student_id' => $id
            ]);

            return response()->json([
                'message' => 'Detail saved successfully',

            ], 201);
        } catch (\Exception $e) {
            return response()->json([
                'error' => 'Lỗi: ' . $e->getMessage()
            ], 500);
        }
    }

    public function update(Request $request, $id, $detailId)
    {
        try {
            $request->validate([
                'address' => 'nullable|max:255',
                'phone_number' => 'nullable|string|max:12',
            ]);
            $student = Student::findOrFail($id);
            $detail = $student->details()->findOrFail($detailId);

            $detail->update($request->all());

            return response()->json([
                'message' => 'Detail updated successfully',
                'detail' => $detail
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'error' => 'Lỗi: ' . $e->getMessage()
            ], 500);
        }
    }

    public function destroy($id, $detailId)
    {
        $student = Student::findOrFail($id);
        $detail = $student->details()->findOrFail($detailId);

        $detail->delete();

        return response()->json([
            'message' => 'Detail deleted successfully'
        ], 200);
    }
}
