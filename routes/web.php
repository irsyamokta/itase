<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\HomepageController;
use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Route;


Route::get('/', [HomepageController::class, 'index'])->name('homepage');

Route::middleware(['auth', 'role:participant'])->group(function () {
    Route::get('/event', [HomepageController::class, 'event'])->name('event');
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::get('/admin/dashboard', [DashboardController::class, 'index'])->name('dashboard');
});

require __DIR__.'/auth.php';
