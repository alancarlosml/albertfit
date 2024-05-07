<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\InstructorController;
use App\Http\Controllers\ModalityController;
use App\Http\Controllers\StudentController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::apiResource('instructors', InstructorController::class);
Route::apiResource('students', StudentController::class);
Route::apiResource('categories', CategoryController::class);
Route::apiResource('modalities', ModalityController::class);
