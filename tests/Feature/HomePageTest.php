<?php

use App\Models\BlogPost;
use App\Models\Fixture;
use App\RugbyType;

beforeEach(function () {
    $this->withoutVite();
});

test('the homepage shows the next fixture and most recent club news', function () {
    Fixture::factory()->create(['opposition' => 'Past opponents', 'start' => now()->subDay()]);
    $nextFixture = Fixture::factory()->create(['type' => RugbyType::UNION, 'opposition' => 'Next opponents', 'start' => now()->addDay()]);
    Fixture::factory()->create(['opposition' => 'Later opponents', 'start' => now()->addDays(2)]);
    BlogPost::factory()->create(['title' => 'Old story', 'created_at' => now()->subDays(4)]);
    $post = BlogPost::factory()->create(['title' => 'Latest story', 'created_at' => now()]);
    BlogPost::factory()->create(['title' => 'Second story', 'created_at' => now()->subDay()]);
    BlogPost::factory()->create(['title' => 'Third story', 'created_at' => now()->subDays(2)]);

    $this->get(route('home'))
        ->assertOk()
        ->assertSee('Next opponents')
        ->assertSee(route('fixtures.show', $nextFixture))
        ->assertDontSee('Past opponents')
        ->assertDontSee('Later opponents')
        ->assertSeeInOrder(['Latest story', 'Second story', 'Third story'])
        ->assertSee(route('blog.show', $post->slug))
        ->assertDontSee('Old story');
});

test('the homepage explains when there are no fixtures or news', function () {
    $this->get(route('home'))
        ->assertOk()
        ->assertSee('No upcoming fixtures are scheduled yet')
        ->assertSee('Club news will appear here when');
});
