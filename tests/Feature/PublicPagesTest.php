<?php

use App\Models\BlogPost;
use App\Models\CommitteeMember;
use App\Models\Fixture;
use App\RugbyType;

beforeEach(function () {
    $this->withoutVite();
});

test('the blog lists posts and shows a post by slug', function () {
    $post = BlogPost::factory()->create(['title' => 'Club news', 'content' => 'Latest updates']);

    $this->get(route('blog.index'))->assertOk()->assertSee('Club news')->assertSee('Latest updates');
    $this->get(route('blog.show', $post->slug))->assertOk()->assertSee('Club news')->assertSee('Latest updates');
});

test('the committee page only shows active members in order', function () {
    CommitteeMember::factory()->create(['name' => 'Second', 'is_active' => true, 'sort_order' => 2]);
    CommitteeMember::factory()->create(['name' => 'First', 'is_active' => true, 'sort_order' => 1]);
    CommitteeMember::factory()->create(['name' => 'Inactive', 'is_active' => false]);

    $this->get(route('committee'))->assertOk()->assertSeeInOrder(['First', 'Second'])->assertDontSee('Inactive');
});

test('external links are shared with the page', function () {
    config(['external_links.links' => [['name' => 'Club shop', 'href' => 'https://example.com']]]);

    $this->get(route('external-links'))->assertOk()->assertSee('Club shop')->assertSee('https://example.com');
});

test('fixtures are filtered by rugby type and shown individually', function () {
    $fixture = Fixture::factory()->create(['type' => RugbyType::TOUCH, 'opposition' => 'Touch opponents']);
    Fixture::factory()->create(['type' => RugbyType::UNION, 'opposition' => 'Union opponents']);

    $this->get(route('fixtures.index', RugbyType::TOUCH))->assertOk()->assertSee('Touch opponents')->assertDontSee('Union opponents');
    $this->get(route('fixtures.show', [RugbyType::TOUCH, $fixture]))->assertOk()->assertSee('Touch opponents');
    $this->get('/fixtures/invalid')->assertNotFound();
});

test('the training page shows both rugby formats and the training venue', function () {
    $this->get(route('training-sessions'))
        ->assertOk()
        ->assertSee('Touch Rugby Training')
        ->assertSee('Rugby Union Training')
        ->assertSee('Nottingham Casuals');
});
