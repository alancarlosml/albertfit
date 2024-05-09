<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('admin.dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';


Route::get('/estabelecimentos', [\App\Http\Controllers\EstablishmentController::class, 'index'])->name('admin.establishments.index');
Route::get('/estabelecimentos/novo', [\App\Http\Controllers\EstablishmentController::class, 'create'])->name('admin.establishments.create');
Route::post('/estabelecimentos/novo', [\App\Http\Controllers\EstablishmentController::class, 'store'])->name('admin.establishments.store');
Route::get('/estabelecimentos/{establishment}/editar', [\App\Http\Controllers\EstablishmentController::class, 'edit'])->name('admin.establishments.edit');
Route::post('/estabelecimentos/{establishment}/editar', [\App\Http\Controllers\EstablishmentController::class, 'update'])->name('admin.establishments.update');
Route::delete('/estabelecimentos/{establishment}/excluir', [\App\Http\Controllers\EstablishmentController::class, 'destroy'])->name('admin.establishments.destroy');
Route::get('/estabelecimentos/{establishment}/restaurar', [\App\Http\Controllers\EstablishmentController::class, 'restore'])->name('admin.establishments.restore');

Route::resource('instructors', \App\Http\Controllers\InstructorController::class);
Route::resource('students', \App\Http\Controllers\StudentController::class);
Route::resource('categories', \App\Http\Controllers\CategoryController::class);
Route::resource('modalities', \App\Http\Controllers\ModalityController::class);

