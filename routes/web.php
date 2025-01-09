<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\ProjectDetailController;
Route::get('/', function () {
    return view('welcome');
});


Route::get('/departments', [DepartmentController::class, 'index']);
Route::get('/department/{id}', [DepartmentController::class, 'show']);

Route::get('/employees', [EmployeeController::class, 'index'] );
Route::get('/employee/{id}', [EmployeeController::class, 'show']);
Route::get('/create-employee', [EmployeeController::class, 'create_form'])->name('employee.create');
Route::post('/store-employee', [EmployeeController::class, 'store'])->name('employee.store');;

Route::get('/projects', [ProjectController::class, 'index']);
Route::get('/project/id', [ProjectController::class, 'show']);

Route::get('/project_details', [ProjectDetailController::class, 'index']);
Route::get('/project_detail/{id}', [ProjectDetailController::class, 'show']);