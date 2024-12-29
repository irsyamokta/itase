<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EventController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ParticipantController;
use App\Http\Controllers\MidtransController;

Route::post('/midtrans/notifications', [MidtransController::class, 'notification'])->name('midtrans.notification');

Route::prefix('dashboard')->name('dashboard.')->group(function () {

    Route::get('participants', [DashboardController::class, 'participant'])->name('participant');

    Route::prefix('events')->name('event.')->group(function () {
        Route::get('/', [DashboardController::class, 'event'])->name('index');
        Route::post('form', [EventController::class, 'store'])->name('store');
        Route::get('update/{id}', [EventController::class, 'view'])->name('view');
        Route::patch('update/{id}', [EventController::class, 'update'])->name('update');
        Route::delete('delete/{id}', [EventController::class, 'destroy'])->name('destroy');
    });
});
