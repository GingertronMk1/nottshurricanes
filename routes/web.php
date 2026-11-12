<?php

use App\Http\Controllers\BlogPostController;
use App\Http\Controllers\CommitteeController;
use App\Http\Controllers\ExternalLinksController;
use App\Http\Controllers\FixturesController;

Route::get('/', fn () => view('welcome'))->name('home');

Route::get('/about-us', fn () => view('about-us'))->name('about-us');
Route::get('/committee', CommitteeController::class)->name('committee');
Route::get('/external-links', ExternalLinksController::class)->name('external-links');

Route::prefix('/blog')->name('blog.')->group(function () {
    Route::get('/', [BlogPostController::class, 'index'])->name('index');
    Route::get('/{blog_post:slug}', [BlogPostController::class, 'show'])->name('show');
});

Route::prefix('/touch-rugby')->name('touch-rugby.')->group(function () {
    Route::get('/training-sessions', fn () => view('training-sessions'))->name('training-sessions');
});

Route::prefix('/rugby-union')->name('rugby-union.')->group(function () {
    Route::get('/training-sessions', fn () => view('training-sessions'))->name('training-sessions');
});

Route::get('/fixtures/{rugbyType}', [FixturesController::class, 'index'])->name('fixtures.index');
Route::get('/fixtures/{rugbyType}/{fixture}', [FixturesController::class, 'show'])->name('fixtures.show');
