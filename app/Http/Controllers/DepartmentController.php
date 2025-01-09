<?php

namespace App\Http\Controllers;
use App\Models\Department;
use Illuminate\Http\Request;

class DepartmentController extends Controller
{
    public function index(){
        $departments = Department::all();
        return view('employee.form', compact('departments'));
    }

    public function show($id){
        $department = Department::findOrFail($id);
        dd($department);
    }

    public function destroy($id)
    {
        // Xóa phòng ban
        $department = Department::findOrFail($id);
        $department->delete();
        
    }
}
