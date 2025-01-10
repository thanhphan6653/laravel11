<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\UserController;
use App\Models\User;
use GuzzleHttp\Psr7\Request;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/form', [UserController::class, 'index']);
Route::post('/form', [UserController::class, 'store'])->name('form.store');
Route::put('/form/{id}', [UserController::class, 'update']);
Route::delete('/form/{id}', [UserController::class, 'destroy']);

// Auth
Route::get('/register', [AuthController::class, 'showFormRegister'])->name('form.register');
Route::post('/register', [AuthController::class, 'register'])->name('register');
Route::get('/login', [AuthController::class, 'showFormLogin'])->name('form.login');
Route::post('/login', [AuthController::class, 'login'])->name('login');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::get('/', [DashboardController::class, 'index'])->name('index')->middleware('auth', 'verified');

Route::get('email/verify/{id}', [AuthController::class, 'verify'])->name('verification.verify');

Route::get('/email/verify/{id}', function ($id) {
    $user = User::findOrFail($id);
    $user->markEmailAsVerified();

    return redirect()->route('login')->with('status', 'Your email has been verified!');
})->name('verification.verify');


Route::get('/forgot-password', [AuthController::class, 'showFormForgotPassword'])->name('password.request');
Route::post('/forgot-password', [AuthController::class, 'forgotPassword'])->name('password.email');
Route::get('/reset-password/{token}', [AuthController::class, 'showResetPassword'])->name('password.reset');
Route::post('/reset-password', [AuthController::class, 'resetPassword'])->name('password.update');
