<?php

use App\Http\Controllers\AuthorController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\ChapterController;
use App\Http\Controllers\GenreController;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get('/users', [UserController::class, 'index']);
Route::get('detail-user/{id}', [UserController::class, 'show']);
Route::post('create-user', [UserController::class, 'store']);
Route::put('update-user/{id}', [UserController::class, 'update']);
Route::delete('/delete-user/{id}', [UserController::class, 'destroy']);

Route::get('/genres', [GenreController::class, 'index']);
Route::post('create-genre', [GenreController::class, 'store']);
Route::put('update-genre/{id}', [GenreController::class, 'update']);
Route::delete('/delete-genre/{id}', [GenreController::class, 'destroy']);

Route::get('/authors', [AuthorController::class, 'index']);
Route::post('create-author', [AuthorController::class, 'store']);
Route::put('update-author/{id}', [AuthorController::class, 'update']);
Route::delete('/delete-author/{id}', [AuthorController::class, 'destroy']);

Route::get('/books', [BookController::class, 'index']);
Route::post('/create-book', [BookController::class, 'store']);
Route::get('/book/{id}', [BookController::class, 'show']);
Route::put('/update-book/{id}', [BookController::class, 'update']);
Route::delete('/delete-book/{id}', [BookController::class, 'destroy']);

Route::get('/book/{id}/chapters', [ChapterController::class, 'index']);
Route::post('book/{id}/create-chapter', [ChapterController::class, 'store']);
Route::put('/update-chapter/{id}', [ChapterController::class, 'update']);
