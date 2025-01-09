<?php

namespace App\Http\Controllers;
use App\Models\Employee;
use App\Http\Requests\EmployeeRequest;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    public function index()
    {
        $employees = Employee::all();
        dd($employees);
        return view('form1');
    }

    public function show($id)
    {
        $employee = Employee::findOrFail($id);
        dd($employee);
    }

    
    public function destroy($id)
    {
        $employee = Employee::findOrFail($id);
        $employee->delete();
        
    }

    public function create_form(){
        return view('employee.form');
    }

    public function store(EmployeeRequest $request)
    {
        

        $data = $request->all();
        Employee::create($data);

        return redirect()->back()->with('success', 'Nhân viên đã được thêm thành công!');
    }
}
