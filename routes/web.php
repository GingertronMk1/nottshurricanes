<?php

use App\Http\Controllers\CommitteeController;

Route::inertia('/', 'Welcome')->name('home');

Route::inertia('/about-us', 'AboutUs')->name('about-us');
Route::get( '/committee', CommitteeController::class)->name('committee');

Route::prefix('/touch-rugby')->name('touch-rugby.')->group(function () {
    Route::inertia('/training-sessions', 'TouchRugby/TrainingSessions')->name('training-sessions');
});

Route::prefix('/rugby-union')->name('rugby-union.')->group(function () {
    Route::inertia('/training-sessions', 'RugbyUnion/TrainingSessions')->name('training-sessions');
});
