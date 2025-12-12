<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ProfileController;

// 🏠 Homepage
Route::get('/', function () {
    return view('welcome');
});

// 🧑‍💻 Authenticated routes
Route::middleware(['auth'])->group(function () {
    // Posts page
    Route::get('/posts', [PostController::class, 'index'])->name('posts.index');

    // Dashboard (🟢 Fix for your error)
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    // Profile management (from Breeze)
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// 🧩 Auth routes (login, register, etc.)
require __DIR__.'/auth.php';
