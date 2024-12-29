<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EventController;
use App\Http\Controllers\DashboardController;

Route::post('dashboard/events/form', [EventController::class, 'store'])->name('event.store');
Route::get('dashboard/events', [DashboardController::class, 'event'])->name('dashboard.event');

Route::get('dashboard/events/update/{id}', [EventController::class, 'view'])->name('event.view');
Route::patch('dashboard/events/update/{id}', [EventController::class, 'update'])->name('event.update');
Route::delete('dashboard/events/delete/{id}', [EventController::class, 'destroy'])->name('event.destroy');
