<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LetterController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\AboutController;

Route::get('/', [LetterController::class, 'index'])->name('letters.index');
Route::get('/letters/create', [LetterController::class, 'create'])->name('letters.create');
Route::post('/letters', [LetterController::class, 'store'])->name('letters.store');
Route::get('/letters/{letter}', [LetterController::class, 'show'])->name('letters.show');
Route::delete('/letters/{letter}', [LetterController::class, 'destroy'])->name('letters.destroy');
Route::get('/letters/{letter}/download', [LetterController::class, 'download'])->name('letters.download');

Route::get('/categories', [CategoryController::class, 'index'])->name('categories.index');
Route::get('/categories/create', [CategoryController::class, 'create'])->name('categories.create');
Route::post('/categories', [CategoryController::class, 'store'])->name('categories.store');
Route::get('/categories/{category}/edit', [CategoryController::class, 'edit'])->name('categories.edit');
Route::put('/categories/{category}', [CategoryController::class, 'update'])->name('categories.update');
Route::delete('/categories/{category}', [CategoryController::class, 'destroy'])->name('categories.destroy');

Route::get('/about', [AboutController::class, 'index'])->name('about');
