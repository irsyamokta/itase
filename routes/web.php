<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\HomepageController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ParticipantController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\MidtransController;
use App\Http\Controllers\SubmissionController;
use Illuminate\Support\Facades\Route;
use Midtrans\Transaction;

Route::get('/', [HomepageController::class, 'index'])->name('homepage');
Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');

Route::middleware(['auth', 'role:participant'])->group(function () {
    Route::get('/event', [HomepageController::class, 'event'])->name('event');
    Route::get('/event/payment/{id}', [TransactionController::class, 'index'])->name('event.payment');
    Route::post('/event/order/{id}', [TransactionController::class, 'order'])->name('event.order');

    Route::get('/team', [HomepageController::class, 'team'])->name('team');

    Route::get('/team/register', [HomepageController::class, 'registerTeam'])->name('team.register');
    Route::post('/team/register', [ParticipantController::class, 'store'])->name('team.store');
    Route::get('/team/view/{id}', [ParticipantController::class, 'view'])->name('team.view')->middleware('verify.team.leader');
    Route::post('/team/update/{id}', [ParticipantController::class, 'update'])->name('team.update')->middleware('verify.team.leader');
    Route::get('/team/destroy', [ParticipantController::class, 'destroy'])->name('team.destroy');

    Route::get('/transaction/payment', [MidtransController::class, 'index'])->name('midtrans.payment');

    Route::post('/submission', [SubmissionController::class, 'store'])->name('submission.store');
});

Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::prefix('dashboard')->group(function () {
        Route::get('/', [DashboardController::class, 'index'])->name('dashboard');

        Route::get('/participants', [DashboardController::class, 'participant'])->name('dashboard.participant');
        Route::get('/participants/search', [ParticipantController::class, 'search'])->name('participant.search');

        Route::get('/events', [DashboardController::class, 'event'])->name('dashboard.event');
        Route::get('/events/form', [EventController::class, 'index'])->name('event.form');
        Route::post('/events/form', [EventController::class, 'store'])->name('event.store');
        Route::get('/events/update/{id}', [EventController::class, 'view'])->name('event.view');
        Route::patch('/events/update/{id}', [EventController::class, 'update'])->name('event.update');
        Route::delete('/events/delete/{id}', [EventController::class, 'destroy'])->name('event.destroy');

        Route::get('/submissions', [DashboardController::class, 'submission'])->name('dashboard.submission');

        Route::get('/settings', [DashboardController::class, 'setting'])->name('dashboard.setting');


    });
});

require __DIR__.'/auth.php';
