<?php

use App\Models\BlogPost;
use App\Models\Fixture;

test('blog posts with the same title receive unique slugs', function () {
    $first = BlogPost::factory()->create(['title' => 'Club news']);
    $second = BlogPost::factory()->create(['title' => 'Club news']);

    expect($first->slug)->toBe('club-news');
    expect($second->slug)->toBe('club-news-1');
});

test('a fixture indicates whether it has happened', function () {
    $past = Fixture::factory()->make(['start' => now()->subDay()]);
    $future = Fixture::factory()->make(['start' => now()->addDay()]);

    expect($past->has_happened)->toBeTrue();
    expect($future->has_happened)->toBeFalse();
});
