<?php

use App\Models\BlogPost;
use App\Models\CommitteeMember;
use App\Models\Fixture;
use App\RugbyType;
use Inertia\Testing\AssertableInertia as Assert;

beforeEach(function () {
    $this->withoutVite();
});

test('the blog lists posts and shows a post by slug', function () {
    $post = BlogPost::factory()->create(['title' => 'Club news']);

    $this->get(route('blog.index'))->assertOk()->assertInertia(fn (Assert $page) => $page
        ->component('BlogPost/Index')->has('posts.data', 1)->where('posts.data.0.title', 'Club news'));
    $this->get(route('blog.show', $post->slug))->assertOk()->assertInertia(fn (Assert $page) => $page
        ->component('BlogPost/Show')->where('post.id', $post->id));
});

test('the committee page only shows active members in order', function () {
    CommitteeMember::factory()->create(['name' => 'Second', 'is_active' => true, 'sort_order' => 2]);
    CommitteeMember::factory()->create(['name' => 'First', 'is_active' => true, 'sort_order' => 1]);
    CommitteeMember::factory()->create(['name' => 'Inactive', 'is_active' => false]);

    $this->get(route('committee'))->assertOk()->assertInertia(fn (Assert $page) => $page
        ->component('Committee')->has('committee_members', 2)
        ->where('committee_members.0.name', 'First')->where('committee_members.1.name', 'Second'));
});

test('external links are shared with the page', function () {
    config(['external_links.links' => ['Club shop' => 'https://example.com']]);

    $this->get(route('external-links'))->assertOk()->assertInertia(fn (Assert $page) => $page
        ->component('ExternalLinks')->where('links.Club shop', 'https://example.com'));
});

test('fixtures are filtered by rugby type and shown individually', function () {
    $fixture = Fixture::factory()->create(['type' => RugbyType::TOUCH]);
    Fixture::factory()->create(['type' => RugbyType::UNION]);

    $this->get(route('fixtures.index', RugbyType::TOUCH))->assertOk()->assertInertia(fn (Assert $page) => $page
        ->component('Fixtures/Index')->has('fixtures.data', 1)->where('fixtures.data.0.id', $fixture->id));
    $this->get(route('fixtures.show', [RugbyType::TOUCH, $fixture]))->assertOk()->assertInertia(fn (Assert $page) => $page
        ->component('Fixtures/Show')->where('fixture.id', $fixture->id));
    $this->get('/fixtures/invalid')->assertNotFound();
});
