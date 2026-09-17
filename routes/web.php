<?php

use App\Http\Controllers\BlogPostController;
use App\Http\Controllers\CommitteeController;
use App\Http\Controllers\ExternalLinksController;
use App\Http\Controllers\FixturesController;

Route::inertia('/', 'Welcome')->name('home');

Route::inertia('/about-us', 'AboutUs')->name('about-us');
Route::get('/committee', CommitteeController::class)->name('committee');
Route::get('/external-links', ExternalLinksController::class)->name('external-links');

Route::prefix('/blog')->name('blog.')->group(function () {
    Route::get('/', [BlogPostController::class, 'index'])->name('index');
    Route::get('/{blog_post:slug}', [BlogPostController::class, 'show'])->name('show');
});

Route::prefix('/touch-rugby')->name('touch-rugby.')->group(function () {
    Route::inertia('/training-sessions', 'TouchRugby/TrainingSessions')->name('training-sessions');
});

Route::prefix('/rugby-union')->name('rugby-union.')->group(function () {
    Route::inertia('/training-sessions', 'RugbyUnion/TrainingSessions')->name('training-sessions');
});

Route::get('/fixtures/{rugbyType}', [FixturesController::class, 'index'])->name('fixtures.index');
Route::get('/fixtures/{rugbyType}/{fixture}', [FixturesController::class, 'show'])->name('fixtures.show');
