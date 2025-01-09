<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    public function index()
    {
        $employees = Employee::all();
    }

    public function show($id)
    {
        $employee = Employee::findOrFail($id);
        
    }

    
    public function destroy($id)
    {
        $employee = Employee::findOrFail($id);
        $employee->delete();
        
    }
}
