<?php

use App\Http\Controllers\Admin\BookController;
use App\Http\Controllers\Auth\AdminLoginController;
use App\Http\Controllers\Auth\UserLoginController;
use Illuminate\Support\Facades\Route;

// -------------------------------------------------------
// USER AUTH ROUTES
// -------------------------------------------------------
Route::get('/login', [UserLoginController::class, 'showLoginForm'])
    ->name('user.login');

Route::post('/login', [UserLoginController::class, 'login'])
    ->name('user.login.submit');

Route::post('/logout', [UserLoginController::class, 'logout'])
    ->name('user.logout');

// -------------------------------------------------------
// USER PROTECTED ROUTES
// -------------------------------------------------------
Route::middleware(['auth', 'not.admin'])->group(function () {
    Route::get('/dashboard', function () {
        return view('user.dashboard');
    })->name('user.dashboard');
});

// -------------------------------------------------------
// ADMIN AUTH ROUTES
// -------------------------------------------------------
Route::get('/admin/login', [AdminLoginController::class, 'showLoginForm'])
    ->name('admin.login');

Route::post('/admin/login', [AdminLoginController::class, 'login'])
    ->name('admin.login.submit');

Route::post('/admin/logout', [AdminLoginController::class, 'logout'])
    ->name('admin.logout');

// -------------------------------------------------------
// ADMIN PROTECTED ROUTES
// -------------------------------------------------------
Route::middleware(['auth', 'admin'])->prefix('admin')->group(function () {

    Route::get('/dashboard', function () {
        return view('admin.dashboard');
    })->name('admin.dashboard');

    // Rutas manuales del CRUD de libros (sin usar Route::resource)
    // Cada ruta definida explicitamente para que veas exactamente que hace cada una
    Route::get('/books', [BookController::class, 'index'])
        ->name('admin.books.index');

    Route::get('/books/create', [BookController::class, 'create'])
        ->name('admin.books.create');

    Route::post('/books', [BookController::class, 'store'])
        ->name('admin.books.store');

    Route::get('/books/{book}/edit', [BookController::class, 'edit'])
        ->name('admin.books.edit');

    Route::put('/books/{book}', [BookController::class, 'update'])
        ->name('admin.books.update');

    Route::delete('/books/{book}', [BookController::class, 'destroy'])
        ->name('admin.books.destroy');
});
