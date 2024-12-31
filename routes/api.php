<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EventController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ParticipantController;
use App\Http\Controllers\MidtransController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\Auth\PasswordController;

Route::post('login', [AuthenticatedSessionController::class, 'storeJson']);
Route::post('register', [RegisteredUserController::class, 'storeJson']);
Route::put('password', [PasswordController::class, 'updateJson']);

Route::post('/midtrans/notifications', [MidtransController::class, 'notification']);

Route::prefix('dashboard')->name('dashboard.')->group(function () {

    Route::get('/orders', [DashboardController::class, 'index']);
    Route::get('participants', [DashboardController::class, 'participant']);
    Route::get('submissions', [DashboardController::class, 'submission']);

    Route::prefix('events')->name('event.')->group(function () {
        Route::get('/', [DashboardController::class, 'event']);
        Route::post('form', [EventController::class, 'store']);
        Route::get('update/{id}', [EventController::class, 'view']);
        Route::patch('update/{id}', [EventController::class, 'update']);
        Route::delete('delete/{id}', [EventController::class, 'destroy']);
    });
});

Route::post('/team/register', [ParticipantController::class, 'store']);
Route::get('/team/view/{id}', [ParticipantController::class, 'view']);
Route::patch('/team/update/{id}', [ParticipantController::class, 'update']);
Route::delete('/team/destroy/{id}', [ParticipantController::class, 'destroy']);

