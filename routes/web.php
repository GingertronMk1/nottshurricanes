<?php

use App\Http\Controllers\TouchRugby\TrainingSessionsController as TouchTrainingController;
use App\Http\Controllers\RugbyUnion\TrainingSessionsController as UnionTrainingController;
use Illuminate\Support\Facades\Route;

Route::inertia('/', 'Welcome')->name('home');

Route::prefix('/touch-rugby')->name('touch-rugby.')->group(function () {
    Route::get('/training-sessions', TouchTrainingController::class)->name('training-sessions');
});

Route::prefix('/rugby-union')->name('rugby-union.')->group(function () {
    Route::get('/training-sessions', UnionTrainingController::class)->name('training-sessions');
});
