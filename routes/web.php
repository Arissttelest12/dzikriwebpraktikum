<?php

use App\Http\Controllers\BookController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/buku', [BookController::class, 'index'])->name('books');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

});

Route::middleware('role:pustakawan')->group(function () {
    Route::get('/buku', [BookController::class, 'index'])->name('books');
    Route::get('/buku/create', [BookController::class, 'create'])->name('books.create');
    Route::get('/buku/print', [BookController::class, 'print'])->name('books.print');
    Route::get('/buku/export', [BookController::class, 'export'])->name('books.export');
    Route::post('/buku/import', [BookController::class, 'import'])->name('books.import');

    Route::post('/buku/create/store', [BookController::class, 'store'])->name('books.store');
    Route::get('/buku/edit/{id}', [BookController::class, 'edit'])->name('books.edit');
    Route::put('/buku/edit/update/{id}', [BookController::class, 'update'])->name('books.update');
    Route::delete('/buku/{id}', [BookController::class, 'destroy'])->name('books.destroy');
});

// Route::middleware('role:mahasiswa')->group(function () {
//     Route::get('/buku', [BookController::class, 'show'])->name('books.show');
// });
require __DIR__.'/auth.php';
