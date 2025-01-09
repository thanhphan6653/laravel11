<?php

use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/form', [UserController::class, 'index']);
Route::post('/form', [UserController::class, 'store'])->name('form.store');
Route::put('/form/{id}', [UserController::class, 'update']);
Route::delete('/form/{id}', [UserController::class, 'destroy']);
