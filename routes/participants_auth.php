<?php

use Inertia\Inertia;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\RegisteredParticipantController;
use App\Http\Controllers\Auth\AuthenticatedSessionParticipantController;

Route::prefix('participant')->group(function () {
    Route::get('/register', [RegisteredParticipantController::class, 'create'])
        ->middleware(['guest', 'guest:participants'])
        ->name('participant.register');

    Route::post('/register', [RegisteredParticipantController::class, 'store'])
        ->middleware(['guest', 'guest:participants']);

    Route::get('/login', [AuthenticatedSessionParticipantController::class, 'create'])
        ->middleware(['guest', 'guest:participants'])
        ->name('participant.login');

    Route::post('/login', [AuthenticatedSessionParticipantController::class, 'store'])
        ->middleware(['guest', 'guest:participants']);

    Route::post('/logout', [AuthenticatedSessionParticipantController::class, 'destroy'])
        ->middleware('auth:participants')
        ->name('participant.logout');

    Route::get('/dashboard', function () {
        return Inertia::render('ParticipantDashboard', [
            'isParticipant' => true
        ]);
    })->middleware('auth:participants')->name('participant.dashboard');
});
