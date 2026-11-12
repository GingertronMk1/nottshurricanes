<?php

use Illuminate\Support\Facades\Route;

test('an unnamed route can be rendered', function () {
    Route::get('/unnamed-page', fn () => view('training-sessions'));

    $this->get('/unnamed-page')->assertOk();
});
