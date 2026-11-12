<?php

use App\Models\PageContent;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

test('page content resolves the URI of a named route', function () {
    $pageContent = PageContent::factory()->make(['route' => 'about-us']);

    expect($pageContent->route_uri)->toBe('about-us');
});

test('page content with a removed route has no URI', function () {
    $pageContent = PageContent::factory()->make(['route' => 'removed-page']);

    expect($pageContent->route_uri)->toBeNull();
});

test('an unnamed inertia route can be rendered', function () {
    Route::get('/unnamed-page', fn () => Inertia::render('Welcome'));

    $this->get('/unnamed-page')->assertOk();
});
