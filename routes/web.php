<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AlumniController;
use App\Http\Controllers\CloudController;
use App\Http\Controllers\CareerController;

Route::middleware(['auth'])->group(function () {
    Route::get('/career', [CareerController::class, 'index'])->name('career.index');
    Route::get('/career/job', [CareerController::class, 'job'])->name('career.job');
    Route::get('/career/internship', [CareerController::class, 'internship'])->name('career.internship');
    Route::post('/career/apply', [CareerController::class, 'apply'])->name('career.apply');
});


Route::get('/upload', function () {
    return view('upload');
});

Route::get('/', function () {
    return view('welcome');
});

Route::middleware('auth')->group(function () {
    Route::post('/upload', [CloudController::class, 'upload']);
    Route::resource('alumni', AlumniController::class);
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
