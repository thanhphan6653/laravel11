<?php

use App\Http\Controllers\ClubController;
use App\Http\Controllers\EnrollmentController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\StudentDetailController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/club', [ClubController::class, 'index']);
Route::get('/club/{id}', [ClubController::class, 'show']);
Route::post('/club', [ClubController::class, 'store']);
Route::put('/club/{id}', [ClubController::class, 'update']);
Route::delete('/club/{id}', [ClubController::class, 'destroy']);

Route::get('/student', [StudentController::class, 'index']);
Route::get('/student/{id}', [StudentController::class, 'show']);
Route::post('/student', [StudentController::class, 'store']);
Route::put('/student/{id}', [StudentController::class, 'update']);
Route::delete('/student/{id}', [StudentController::class, 'destroy']);

Route::get('/student/{id}/details', [StudentDetailController::class, 'showDetail']);
Route::post('/student/{id}/details', [StudentDetailController::class, 'store']);
Route::put('/student/{id}/details/{detailId}', [StudentDetailController::class, 'update']);
Route::delete('/student/{id}/details/{detailId}', [StudentDetailController::class, 'destroy']);

Route::get('/enrollment', [EnrollmentController::class, 'index']);
Route::post('/enrollment', [EnrollmentController::class, 'store']);
Route::put('/enrollment/{id}', [EnrollmentController::class, 'update']);
Route::delete('/enrollment/{id}', [EnrollmentController::class, 'destroy']);
