<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MidtransController;
use App\Http\Controllers\Api\AdminController;
use App\Http\Controllers\Api\Auth\AuthenticatedController;
use App\Http\Controllers\Api\Auth\RegisterController;
use App\Http\Controllers\Api\Auth\PasswordController;
use App\Http\Controllers\Api\ParticipantController;
use App\Http\Controllers\Api\EventController;
use App\Http\Controllers\Api\UserController;

Route::post('login', [AuthenticatedController::class, 'login']);
Route::post('register', [RegisterController::class, 'register']);

Route::middleware('auth:sanctum')->group(function () {
    Route::put('password', [PasswordController::class, 'update']);
});
Route::middleware('auth:sanctum')->group(function () {
    Route::post('logout', [AuthenticatedController::class, 'destroy']);
});

Route::get('dashboard', [AdminController::class, 'dashboard']);
Route::get('transactions', [AdminController::class, 'transaction']);
Route::get('participants', [AdminController::class, 'participant']);
Route::get('events', [AdminController::class, 'event']);
Route::get('submissions', [AdminController::class, 'submission']);

Route::post('event/store', [EventController::class, 'store']);
Route::get('event/view/{id}', [EventController::class, 'view']);
Route::patch('event/update/{id}', [EventController::class, 'update']);
Route::delete('event/destroy/{id}', [EventController::class, 'destroy']);

Route::post('team/store', [ParticipantController::class, 'store']);
Route::get('team/view/{id}', [ParticipantController::class, 'view']);
Route::patch('team/update/{id}', [ParticipantController::class, 'update']);
Route::delete('team/destroy/{id}', [ParticipantController::class, 'destroy']);

Route::get('user/view/{id}', [UserController::class, 'view']);
Route::put('user/update/{id}', [UserController::class, 'update']);
Route::delete('user/destroy/{id}', [UserController::class, 'destroy']);

Route::post('midtrans/notifications', [MidtransController::class, 'notification']);

