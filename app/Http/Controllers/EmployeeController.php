<?php

namespace App\Http\Controllers;
use App\Models\Employee;
use App\Http\Requests\EmployeeRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

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
        // dd($data);
        // Employee::create($data);
        Employee::create([
            'employee_name' => $request->employee_name,
            
            'username' => $request->username,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'phone_number' => $request->phone_number,

            'address' => $request->address,
            'salary' =>  0,
            'gender' => $request->gender,
            'date_of_birth' => $request->date_of_birth,
            'join_date' => $request->join_date,
            'id_employee_manager' => 0,
            'id_department' =>  0,
            
            
        ]);

        return redirect()->back()->with('success', 'Nhân viên đã được thêm thành công!');
    }

    public function showLoginForm(){
        return view('employee.login');
    }

    public function login(Request $request){

        

        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        
        $employee = Employee::where('email', $request->email)->first();
        

        if ($employee && Hash::check($request->password, $employee->password)){
            
            session(['user' => $employee]);
            return redirect()->route('employee.home')->with('success', 'Logged in successfully');
        }

        return back()->withErrors(['email' => 'The provided credentials are incorrect.']);
        
    }

    

    public function home(){
        return view('employee.home');
    }

    public function logout(Request $request){
        $request->session()->forget('user');
        $request->session()->invalidate();
        $request->session()->regenerateToken();
    
        return redirect()->route('employee.loginform')->with('message', 'Logged out successfully.');
    }

    

    public function showResetForm(){
        return view('employee.reset-password');
    }

    public function resetPassword(Request $request)
    {
    $request->validate([
        'email' => 'required|email|exists:employee,email',
        'password' => 'required|confirmed',
        'token' => 'required',
    ]);

    // Kiểm tra token reset mật khẩu
    $reset = DB::table('password_reset_tokens')
        ->where('email', $request->email)
        ->where('token', $request->token)
        ->first();

    if (!$reset) {
        return back()->withErrors(['token' => 'Token không hợp lệ hoặc đã hết hạn.']);
    }

    // Lưu mật khẩu mới cho user
    DB::table('employee')
        ->where('email', $request->email)
        ->update(['password' => Hash::make($request->password)]);

    // Xóa token reset sau khi sử dụng
    DB::table('password_reset_tokens')->where('email', $request->email)->delete();

    return redirect()->route('employee.loginform')->with('success', 'Mật khẩu đã được cập nhật!');
}

    


}
