<?php

use App\Http\Controllers\CommitteeController;
use App\Http\Controllers\ExternalLinksController;

Route::inertia('/', 'Welcome')->name('home');

Route::inertia('/about-us', 'AboutUs')->name('about-us');
Route::get('/committee', CommitteeController::class)->name('committee');
Route::get('/external-links', ExternalLinksController::class)->name('external-links');

Route::prefix('/touch-rugby')->name('touch-rugby.')->group(function () {
    Route::inertia('/training-sessions', 'TouchRugby/TrainingSessions')->name('training-sessions');
});

Route::prefix('/rugby-union')->name('rugby-union.')->group(function () {
    Route::inertia('/training-sessions', 'RugbyUnion/TrainingSessions')->name('training-sessions');
});
