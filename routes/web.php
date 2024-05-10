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
Route::get('/estabelecimentos/{establishment}/detalhes', [\App\Http\Controllers\EstablishmentController::class, 'view'])->name('admin.establishments.view');
Route::delete('/estabelecimentos/{establishment}/excluir', [\App\Http\Controllers\EstablishmentController::class, 'destroy'])->name('admin.establishments.destroy');
Route::get('/estabelecimentos/{establishment}/restaurar', [\App\Http\Controllers\EstablishmentController::class, 'restore'])->name('admin.establishments.restore');

Route::get('/estudantes', [\App\Http\Controllers\StudentController::class, 'index'])->name('admin.students.index');
Route::get('/estudantes/novo', [\App\Http\Controllers\StudentController::class, 'create'])->name('admin.students.create');
Route::post('/estudantes/novo', [\App\Http\Controllers\StudentController::class, 'store'])->name('admin.students.store');
Route::get('/estudantes/{student}/editar', [\App\Http\Controllers\StudentController::class, 'edit'])->name('admin.students.edit');
Route::post('/estudantes/{student}/editar', [\App\Http\Controllers\StudentController::class, 'update'])->name('admin.students.update');
Route::get('/estudantes/{student}/detalhes', [\App\Http\Controllers\StudentController::class, 'view'])->name('admin.students.view');
Route::delete('/estudantes/{student}/excluir', [\App\Http\Controllers\StudentController::class, 'destroy'])->name('admin.students.destroy');
Route::get('/estudantes/{student}/restaurar', [\App\Http\Controllers\StudentController::class, 'restore'])->name('admin.students.restore');

