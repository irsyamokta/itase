<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\HomepageController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ParticipantController;
use Illuminate\Support\Facades\Route;


Route::get('/', [HomepageController::class, 'index'])->name('homepage');

Route::middleware(['auth', 'role:participant'])->group(function () {
    Route::get('/event', [HomepageController::class, 'event'])->name('event');
    Route::get('/team', [HomepageController::class, 'team'])->name('team');

    Route::get('/team/register', [HomepageController::class, 'registerTeam'])->name('team.register');
    Route::post('/team/register', [ParticipantController::class, 'store'])->name('team.store');
    Route::get('/team/view/{id}', [ParticipantController::class, 'view'])->name('team.view')->middleware('verify.team.leader');
    Route::post('/team/update/{id}', [ParticipantController::class, 'update'])->name('team.update')->middleware('verify.team.leader');
    Route::get('/team/destroy', [ParticipantController::class, 'destroy'])->name('team.destroy');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    Route::get('/participants', [DashboardController::class, 'participant'])->name('participant');

    Route::get('/events', [DashboardController::class, 'event'])->name('event');

    Route::get('/submissions', [DashboardController::class, 'submission'])->name('submission');
});

require __DIR__.'/auth.php';
