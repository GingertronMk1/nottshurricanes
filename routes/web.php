<?php

use App\Models\CommitteeMember;

Route::inertia('/', 'Welcome')->name('home');

Route::inertia('/about-us', 'AboutUs')->name('about-us');
Route::inertia(
    '/committee',
    'Committee',
    [
        'committee_members' => CommitteeMember::query()->active()->get(),
    ]
)->name('committee');

Route::prefix('/touch-rugby')->name('touch-rugby.')->group(function () {
    Route::inertia('/training-sessions', 'TouchRugby/TrainingSessions')->name('training-sessions');
});

Route::prefix('/rugby-union')->name('rugby-union.')->group(function () {
    Route::inertia('/training-sessions', 'RugbyUnion/TrainingSessions')->name('training-sessions');
});
